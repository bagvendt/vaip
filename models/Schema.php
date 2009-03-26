<?php 
require_once 'ShiftFactory.php';

class Schema
{
	
	private $schema = array();
	
	//$month is a date array
	function __construct($startDate , $slutdate)
	{
        $this->endDate = $slutdate;
        $this->startDate = $startDate;
        $this->typePointer = 0;
		$this->datePointer = $startDate;

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



    //Iterator, kan sikkert gøres smartere med php
    var $datePointer;
    var $typePointer;
    var $endDate;
    var $startDate;

    function next()
    {
        $shift = $this->schema[$this->datePointer][$this->typePointer];
        if($this->typePointer == 3)
        {
            $this->typePointer = 0;
            $this->datePointer += 86400;
        }
        else{
            $this->typePointer += 1;
        }
        return $shift;
    }
    function hasNext()
    {
        return ($this->datePointer != $this->endDate || $this->typePointer != 3);
    }
    function reset()
    {
        $this->typePointer = 0;
        $this->datePointer = $this->startDate;
    }


}
?>