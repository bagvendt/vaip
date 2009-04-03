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
		 	 return $this->type;		
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

        //skal rettes så man kun får fremtidige shifts
        function createEmpShift($emp)
        {
            $list = array();
            $result = mysql_query("SELECT * FROM shift WHERE userid = $emp");
            $i = 0;

            while($row = mysql_fetch_assoc($result))
            {
                $list[$i] = ShiftFactory::createShift($row['dayID'],$row['type'] );
                $i++;
            }
            return $list;
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

        //metoder til vagtbyt
        function insertChangeOffer($sender, $receiver, $senderList, $receiverList)
        { 
            $result = mysql_query("select max(switch_id) as id from switch");
            $row = mysql_fetch_assoc($result);
            $switchId = $row['id'] + 1;

            $result = mysql_query("insert into switch values($switchId, $sender, $receiver, false)");

            if($result)
            {
                foreach($senderList as $shift)
                {
                    $day = $shift->get_date();
                    $type = $shift->get_type();
                    mysql_query("insert into switchdata values($switchId, $day, $type, $receiver)");
                }

                foreach($receiverList as $shift)
                {
                    $day = $shift->get_date();
                    $type = $shift->get_type();
                    mysql_query("insert into switchdata values($switchId, $day, $type, $sender)");
                }

            }

        }
        
        function viewOffers($empid)
        {
            $list = array();
            $switches = mysql_query("select switch_id as id from switch where receiver = $empid AND NOT status");
            while($row = mysql_fetch_assoc($switches))
            {
               $result = mysql_query("select * from switchdata where switch_id = {$row['id']}");
               $switch = array();
               $id = $row['id'] + 0; // for at blive betragtet som int og ikke array
               $switch['id'] = $id;
               $i = 0;
               while($one = mysql_fetch_assoc($result)){
                   $shift = array();
                   $shift['day'] = $one['day'];
                   $shift['type'] = $one['type'];
                   $shift['emp'] = $one['new_emp'];
                   $switch[$i] = $shift;
                   $i++;
               }
               $list[$row['id']] = $switch;
            }

            return $list;
        }


        //lav status om så det er pending, accepted og rejected, på den måde kan man give svar tilbage
        //og trække tilbud tilbage
        function acceptChangeOffer($switch_id)
        {
            $switches = mysql_query("select * from switchdata where switch_id = $switch_id");
            while($row = mysql_fetch_assoc($switches))
            {
                ShiftFactory::addEmployee($row['day'], $row['type'], $row['new_emp']);
            }
            mysql_query("UPDATE switch SET status = true WHERE switch_id = $switch_id");

        }

        function rejectChangeOffer($switch_id)
        {
            mysql_query("delete from switch where switch_id = $switch_id");
            mysql_query("delete from switchdata where switch_id = $switch_id");
        }

	}


  // FIX LIGE SYNTAKS OG INDENTS! SER JO UD AF HELVEDE TIL





?>