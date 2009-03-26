	<?php

/**
 * An Employee
 * @author Softbox
 *
 */
class Employee {
	var $employeeID;
	var $name;
	var $address;
	var $email;
	var $phone;
	/**
		*Constructs an employee
		*/
	function __construct($id,$name,$address,$email,$phone)
	{
		$this->employeeID = $id;
		$this->name = $name;
		$this->address = $address;
		$this->email = $email;
		$this->phone = $phone;
	}
	/**
	 * Returns the id of this employee
	 * @return the employeeID
	 */
	function getID()
	{
		return $this->employeeID;
	}
    function getName()
	{
		return $this->name;
	}
    function getAddress()
	{
		return $this->address;
	}
    function getEmail()
	{
		return $this->email;
	}
    function getPhone()
	{
		return $this->phone;
	}
}

class EmployeeFactory
{
	
	function createEmployee($empID)
	{
		$host = 'localhost';
        $username = 'fadl';
        $password = 'vaip';
        $database = 'fadl';
        

	mysql_connect($host, $username, $password);
	mysql_select_db($database);
	$result = mysql_query('SELECT * FROM employee WHERE empid = '. $empID);
	$row = mysql_fetch_assoc($result); 		
	return new Employee ($empID , $row['name'] , $row['address'],  $row['email'] , $row['phone']);
		
	}

    //lav om så empID bliver auto increment, og returneres
    function insertEmployee($id,$name,$address,$email,$phone )
        {
            $host = 'localhost';
            $username = 'fadl';
            $password = 'vaip';
            $database = 'fadl';

            mysql_connect($host, $username, $password);
            mysql_select_db($database);

            $result = mysql_query("insert into employee values($id, '$name', '$address', '$email', '$phone')");
            return $result;
        }
}
?>
