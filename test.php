<?php 

require_once 'Schema.php';
require_once 'ShiftFactory.php';
require_once 'EmployeeFactory.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');
//require_once ''


$month = array();
$jan1 = 1230768000;
$month[0] = $jan1;
$schema = new Schema ($month);

echo $schema->getShift($jan1 , 1)->get_message();

?>