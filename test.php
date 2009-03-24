<?php 

require_once 'Schema.php';
require_once 'ShiftFactory.php';
require_once 'EmployeeFactory.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');
//require_once ''


$month = array();
$jan1 = 1230768000;
$jan2 = 1230854400;
$schema = new Schema ($jan1 , $jan2);

echo $schema->getShift($jan2 , 3)->get_message();

?>