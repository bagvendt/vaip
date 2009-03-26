<?php


class EmployeeFactory {

    function create($employee_id) {
        $result = mysql_query('SELECT * FROM employees AS e WHERE e.employee_id = "'. $employee_id .'"');
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
    
    function setName($name) {
        $this->name = $name;
    }
    
    function setPhone($phone) {
        $this->phone = $phone;
    }
    
    function setAddress($address) {
        $this->address = $address;
    }

    function save() {
        mysql_query('UPDATE employees AS e
                     SET e.name = "'. $this->name .'",
                         e.address = "'. $this->address .'",
                         e.phone = "'. $this->phone .'"
                     WHERE e.employee_id = "'. $this->employee_id .'"');
    }

}

?>