<?php 
require_once 'ShiftFactory.php';

class Schema
{
	
	private $schema = array();
	
	//$month is a date array
	function __construct($startDate , $slutdate)
	{
		
		$month = array();
		$i = $startDate;
		while ($i <= $slutdate)
		{
		$month[$i] = $i;
		$i += 86400;
		
		}	
		
		foreach ($month as $date)
		{
			
			$this->schema[$date][0] = ShiftFactory::createShift($date , 0);
			$this->schema[$date][1] = ShiftFactory::createShift($date , 1);
			$this->schema[$date][2] = ShiftFactory::createShift($date , 2);
			$this->schema[$date][3] = ShiftFactory::createShift($date , 3);
			
		}
	}
	
	
	public function getShift($date, $type)
	{
		return $this->schema[$date][$type];
	}
}
?>