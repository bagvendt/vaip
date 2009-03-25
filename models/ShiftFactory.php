<?php



	/**
	 * A shift
	 * @author Softbox
	 *
	 */
	class Shift {
		var $type;
		var $date;
		var $empID;
		var $message;
		/**
		 * Constructs a shift
		 * @param date - The date of the shift (in UNIX-time)
		 * @param type - The type of the shift (in integers) 
 		*/
		function __construct($date , $type , $empID, $message) 
		{		
			$this->date = $date;
			$this->type = $type;
			$this->empID = $empID;
			$this->message = $message;		
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
		 /**$date
		  * Sets an employee to this shift
		  * @param $emp the employee to be assigned to this shift
		  */
		function set_employee($emp)
		{
			$this->employee = $emp;
		}
	function get_message()
		{
			return $this->message;
		}
				
	}
		
	class ShiftFactory
	{
	function createShift($dayID , $type)
	{
	$host = 'localhost';
	$username = 'root';
	$password = 'tisimunden';
	$database = 'fadl';

	mysql_connect($host, $username, $password);
	mysql_select_db($database);
		
	$result = mysql_query('SELECT * FROM shift WHERE dayid = "'. $dayID .'" AND type = "' . $type .'"');
	$row = mysql_fetch_assoc($result);
	return new Shift ($dayID , $type , $row['userid'],  $row['message']);
	}
	}


  // FIX LIGE SYNTAKS OG INDENTS! SER JO UD AF HELVEDE TIL





?>