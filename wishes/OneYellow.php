<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OneYellow
 *
 * @author essif
 */
class OneYellow extends rule
{
    //EXCEPT VIRKER IKKE I MySQL wtf!!?!?
    function apply($startDate, $endDate)
    {
        $result = mysql_query(      "SELECT w.shift_id as shift_id, max(w.emp_id) as emp_id
                                    FROM wish as w, wish_shift as s
                                    WHERE (w.priority = 1 OR w.priority = 2)  AND s.emp_id = 0 AND w.shift_id = s.shift_id AND NOT w.occupied
                                    AND w.shift_id NOT IN
                                                    (SELECT w.shift_id
                                                    FROM wish as w, wish_shift as s
                                                    WHERE w.priority = 1  AND s.emp_id = 0 AND w.shift_id = s.shift_id 
                                                        AND NOT w.occupied AND (s.day_id >= $startDate AND s.day_id <= $endDate)
                                                    GROUP BY w.shift_id
                                                    HAVING count(w.shift_id) = 1)
                                    GROUP BY w.shift_id
                                    HAVING count(w.shift_id) = 1");
        $row = mysql_fetch_assoc($result);

        $emp_id = $row['emp_id'];
        $shift_id = $row['shift_id'];

        if($emp_id != null)
        {
            mysql_query( "UPDATE wish_shift SET emp_id = $emp_id WHERE shift_id = $shift_id");
            mysql_query( "UPDATE wish_employee SET assigned = assigned + 1 WHERE emp_id = $emp_id");
            mysql_query( "UPDATE wish SET linked = false WHERE shift_id = " . ($shift_id - 3) . "");
            mysql_query( "UPDATE wish SET occupied = true WHERE emp_id = $emp_id AND
                        (shift_id <= $shift_id +2 AND shift_id >= $shift_id - 2)");

            echo "YELLOW: gave employee number $emp_id shift number $shift_id <br/>";

            return true;
        } else
        {
            echo "No more wishes with only one yellow <br/>";
            return false;
        }


    }


}
?>
