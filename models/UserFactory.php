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
        return EmployeeFactory::create($this->employee_id);
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

}

?>
