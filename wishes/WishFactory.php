<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WishFactory
 *
 * @author essif
 */

require_once 'rule.php';
require_once 'OneGreen.php';
require_once 'OneYellow.php';
require_once 'twoNV.php';
require_once 'leastGreen.php';
require_once 'leastYellow.php';


class WishFactory {
      
    function applyAll($startDate, $endDate)
    {
        $rule = array();
        $rule[0] = new OneGreen('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[1] = new OneYellow('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[2] = new twoNV('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[3] = new leastGreen('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[4] = new leastYellow('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");

        $more = true;

        $i = 0;
        while($more)
        {

            if($rule[$i]->apply($startDate, $endDate))
            {
                $i = 0;

            } elseif ($i >= count($rule) - 1)
            {
                $more = false;
            } else
            {
                $i += 1;
            }


        }
    }

    function createShift($dayID , $type)
        {
            $result = mysql_query("SELECT * FROM wish_shift WHERE day_id = $dayID  AND type = $type");
            $row = mysql_fetch_assoc($result);
            return new WishShift ($dayID , $type , $row['emp_id']);
        }

    function insertEmptyShift($dayID, $type)
        {
            $result = mysql_query("insert into wish_shift values(null, $dayID, $type, 0)");
            return $result;
        }


    function insertShifts($startDate , $slutdate)
    {
        $i = $startDate;
        while ($i <= $slutdate)
        {
            for ($j = 0 ; $j < 3 ; $j++)
            {
                $this->insertEmptyShift($i, $j);
            }
            $i += 86400;
        }
    }

    function commitSchema($startDate , $slutdate)
    {
        $schema = new WishSchema($startDate , $slutdate);
        

        while($schema->hasNext())
        {
            
            $schema->next()->commitShift();
        }


    }


}

class WishShift
    {
		var $type;
		var $date;
		var $empID;
		/**
		 * Constructs a shift
		 * @param date - The date of the shift (in UNIX-time)
		 * @param type - The type of the shift (in integers)
 		*/
		function __construct($date , $type , $empID = "0")
		{
			$this->date = $date;
			$this->type = $type;
			$this->empID = $empID;
		}
		/**
		 * Returns the date (in UNIX-time)
		 * @return The date of the shift (in UNIX-time)
		 */
		function get_employee()
		{
			return EmployeeFactory::createEmployee($this->empID);
		}


		function get_date()
		{
		 	 return $this->date;
		 }
		 /**
		  * Returns the type of the shift
		  * @return The type of$this->employee = $emp; the shift (in integers)
		  */
		function get_type()
		{
		 	 return $thisShift->type;
		}

        //possible chage to update, or add check to see if the shift already exist
        function commitShift()
        {
            ShiftFactory::insertShift($this->date, $this->type, $this->empID);
        }

	}

class WishSchema
    {

	private $schema = array();

	
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

			$this->schema[$date][0] = WishFactory::createShift($date , 0);
			$this->schema[$date][1] = WishFactory::createShift($date , 1);
			$this->schema[$date][2] = WishFactory::createShift($date , 2);
            $this->schema[$date][3] = WishFactory::createShift($date , 3);

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
        return ($this->datePointer < $this->endDate || $this->typePointer != 3);
    }
    function reset()
    {
        $this->typePointer = 0;
        $this->datePointer = $this->startDate;
    }


}
?>
