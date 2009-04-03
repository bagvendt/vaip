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
		
        $result = mysql_query('SELECT * FROM employee WHERE empid = '. $empID);
        $row = mysql_fetch_assoc($result);
        return new Employee ($empID , $row['name'] , $row['address'],  $row['email'] , $row['phone']);
		
	}

    function employeeList()
    {
        $list = array();
        $result = mysql_query("SELECT empid FROM employee");
        $i = 0;
        while($row = mysql_fetch_assoc($result))
        {
            
            $list[$i] = EmployeeFactory::createEmployee($row['empid']);
            $i++;
        }
        return $list;
    }

    //lav om så empID bliver auto increment, og returneres
    function insertEmployee($id,$name,$address,$email,$phone )
    {
        $result = mysql_query("insert into employee values($id, '$name', '$address', '$email', '$phone')");
        return $result;
    }


}
?>
