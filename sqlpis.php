<?php

function getSchema($startTime , $endTime)
{
$resultGetDaysSql = 'SELECT ID FROM DAY WHERE UNIXDATE => "' . $startTime .' 
" AND UNIXDATE => "'. $endTime .'"';
while($row = mysql_fetch_array($result))
{
$resultGetShifts = "SELECT FROM WHERE"	
}

	



function create($user_id) {
        $result = mysql_query('SELECT *
                               FROM Users AS u
                               WHERE u.user_id = "'. $user_id .'"');
        $row = mysql_fetch_assoc($result);
        return new User($row['user_id'], $row['username'], $row['password'], $row['employee_id']);
    }
}


?>