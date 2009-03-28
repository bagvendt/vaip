<?php

class leastGreen extends rule{

    function apply()
    {
        $result = mysql_query("SELECT w.shift_id, w.emp_id
                                FROM wish w, wish_shift s, wish_employee e
                                WHERE priority = 1  AND w.shift_id = s.shift_id AND s.emp_id = 0 AND w.emp_id = e.emp_id
                                AND w.shift_id =    (SELECT  w.shift_id
                                                    FROM wish w, wish_shift s
                                                    WHERE priority = 1  AND w.shift_id = s.shift_id AND s.emp_id = 0
                                                    group by w.shift_id
                                                    order by count(w.shift_id) LIMIT 1 )
                                order by assigned");

        $row = mysql_fetch_assoc($result);

        $emp_id = $row['emp_id'];
        $shift_id = $row['shift_id'];

        if($emp_id != null)
        {
            mysql_query( "UPDATE wish_shift SET emp_id = $emp_id WHERE shift_id = $shift_id");
            mysql_query( "UPDATE wish_employee SET assigned = assigned + 1 WHERE emp_id = $emp_id");
            mysql_query( "UPDATE wish SET linked = false WHERE shift_id = " . ($shift_id - 3) . "");

            echo "LEAST GREEN: gave employee number $emp_id shift number $shift_id <br/>";

            return true;
        } else
        {
            echo "No more wishes with any green <br/>";
            return false;
        }


    }

}
?>
