<?php



	/**
	 * A shift
	 * @author Softbox
	 *
	 */
	class Shift
    {
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

        function get_message()
        {
            return $this->message;
        }

		 /**$date
		  * Sets an employee to this shift
		  * @param $emp the employee to be assigned to this shift
		  */
		function set_employee($empID)
		{
            if(ShiftFactory::addEmployee($this->date, $this->type, $empID))
            {
                $this->empID = $empID;
            }
            
		}

        function set_message($message)
		{
            if(ShiftFactory::addMessage($this->date, $this->type, $message))
            {
                $this->message = $message;
            }

		}
				
	}
		
	class ShiftFactory
	{
        function createShift($dayID , $type)
        {


            $result = mysql_query('SELECT * FROM shift WHERE dayid = "'. $dayID .'" AND type = "' . $type .'"');
            $row = mysql_fetch_assoc($result);
            return new Shift ($dayID , $type , $row['userid'],  $row['message']);
        }

        //byt om på rækkefølge af userid og msg, hvis vagter ofte bliver oprettet med en message
        function insertShift($dayID, $type, $userid = 'null', $message = 'null')
        {
            $result = mysql_query("insert into shift values($dayID, $type, $userid, '$message')");
            return $result;
        }

        function insertShifts($startDate , $slutdate, $userid = 'null', $message = 'null')
        {
            $i = $startDate;
            while ($i <= $slutdate)
            {
                for ($j = 0 ; $j < 4 ; $j++)
                {
                    $this->insertShift($i, $j, $userid, $message);
                }
                $i += 86400;
            }
        }

        function addEmployee($dayID, $type, $userid)
        {
           

            $result = mysql_query("UPDATE shift SET userid = $userid WHERE dayID = $dayID AND type = $type");
            return $result;
        }

        function addMessage($dayID, $type, $message)
        {
            

            $result = mysql_query("UPDATE shift SET message = $message WHERE dayID = $dayID AND type = $type");
            return $result;
        }


	}


  // FIX LIGE SYNTAKS OG INDENTS! SER JO UD AF HELVEDE TIL





?>