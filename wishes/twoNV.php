<?php

class twoNV extends rule{

    function apply()
    {
        $result = mysql_query("SELECT w.shift_id, w.emp_id
                                FROM wish as w, wish_shift as s
                                WHERE linked AND type = 2 AND s.shift_id = w.shift_id AND s.emp_id = 0
                                ORDER BY emp_id, shift_id");

        $row = mysql_fetch_assoc($result);

        $emp_id = $row['emp_id'];
        $shift_id = $row['shift_id'];

        if($emp_id != null)
        {
            mysql_query( "UPDATE wish_shift SET emp_id = $emp_id WHERE (shift_id = $shift_id OR shift_id = $shift_id + 3)");
            mysql_query( "UPDATE wish_employee SET assigned = assigned + 2 WHERE emp_id = $emp_id");
            mysql_query( "UPDATE wish SET linked = false WHERE shift_id = " . ($shift_id - 3) . "");

            echo "TWO NV: gave employee number $emp_id shift number $shift_id and " . ($shift_id + 3) . " <br/>";

            return true;
        } else
        {
            echo "No more wishes with two NV <br/>";
            return false;
        }


    }
    
}
    
?>

