<?php

class UserFactory {

    function create($user_id) {
        $result = mysql_query('SELECT *
                               FROM users AS u
                               WHERE u.user_id = "'. $user_id .'"');
        $row = mysql_fetch_assoc($result);
        return new User($row['user_id'], $row['email'], $row['password'], $row['employee_id']);
    }
    
    public function login($email, $password) {
        $result = mysql_query('SELECT *
                               FROM users AS u
                               WHERE u.email = "'. $email .'"
                               AND u.password = "'. $password .'"');
        if(mysql_num_rows($result) == 1) {
            $row = mysql_fetch_assoc($result);
            return new User($row['user_id'], $row['email'], $row['password'], $row['employee_id']);
        } else {
            return false;
        }
    }

}

class User {

    private $user_id, $email, $password, $employee_id;
    
    function __construct($user_id, $email, $password, $employee_id) {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->password = $password;
        $this->employee_id = $employee_id;
    }
    
    function getEmployee() {
        return EmployeeFactory::createEmployee($this->employee_id);
    }
    
    function getUserId() {
        return $this->user_id;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function getPassword() {
        return $this->password;
    }
    
    function getEmployeeId() {
        return $this->employee_id;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }
    
    function setEmployeeId($employee_id) {
        $this->employee_id = $employee_id;
    }
    
    function save() {
        mysql_query('UPDATE users AS u
                     SET u.email = "'. $this->email .'",
                         u.password = "'. $this->password .'"
                         u.employee_id = "'. $this->employee_id .'"
                     WHERE u.user_id = "'. $this->user_id .'"');
    }

}

?>
