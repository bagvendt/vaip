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

            } elseif ($i >= count($rule))
            {
                $more = false;
            } else
            {
                $i += 1; //chage to += 86400 for unix time
            }


        }
    }

    function createShift($dayID , $type)
        {
            $result = mysql_query('SELECT * FROM wish_shift WHERE dayid = "'. $dayID .'" AND type = "' . $type .'"');
            $row = mysql_fetch_assoc($result);
            return new WishShift ($dayID , $type , $row['userid']);
        }

    function insertEmptyShift($dayID, $type)
        {
            $result = mysql_query("insert into wish_shift values(null, $dayID, $type, 0)");
            return $result;
        }

        //chage to += 86400 for unix time
    function insertShifts($startDate , $slutdate)
    {
        $i = $startDate;
        while ($i <= $slutdate)
        {
            for ($j = 0 ; $j < 3 ; $j++)
            {
                $this->insertShift($i, $j);
            }
            $i += 1;
        }
    }

    function commitSchema($startDate , $slutdate)
    {
        //TODO


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
		function __construct($date , $type , $empID)
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

	}

class WishSchema
    {

	private $schema = array();

	//change i to += 86400 for unix time
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
		$i += 1;

		}

		foreach ($month as $date)
		{

			$this->schema[$date][0] = WishFactory::createShift($date , 0);
			$this->schema[$date][1] = WishFactory::createShift($date , 1);
			$this->schema[$date][2] = WishFactory::createShift($date , 2);

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
