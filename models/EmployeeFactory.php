<?php


class EmployeeFactory {

    function create($employee_id) {
        $result = mysql_query('SELECT * FROM employee WHERE employee_id = "'. $employee_id .'"');
        $row = mysql_fetch_assoc($result);
        return new Employee($employee_id, $row['name'], $row['address'], $row['phone']);
    }
}

/**
* An Employee
* @author Softbox
*/
class Employee {

    private $employee_id, $name, $address, $phone;

    /**
    * Constructs an employee
    */
    function __construct($employee_id, $name, $address, $phone) {
        $this->employee_id = $employee_id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }
    
    function getName() {
        return $this->name;
    }
    
    function getPhone() {
        return $this->phone;
    }
    
    function getAddress() {
        return $this->address;
    }

}

?>