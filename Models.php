<?php

class Models {
    
    private $dbhost, $dbuser, $dbpswd, $dbname, $user;
    
    function __construct($dbhost, $dbuser, $dbpswd, $dbname) {
        // assert that the resources we need are there
        if(!defined('MODELS'))
            die();

        // Model-specs
        require_once MODELS. '/UserFactory.php';
        require_once MODELS. '/EmployeeFactory.php';

        /*

        require_once 'Shifts.php';
        require_once 'Schemas.php';

        */

        // Database
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpswd = $dbpswd;
        $this->dbname = $dbname;
        
        mysql_connect($this->dbhost, $this->dbuser, $this->dbpswd, $this->dbname);
        mysql_select_db($this->dbname);

        // User
        $this->user = null;        
        if(isset($_SESSION['user_id'])) {
            $this->user = UserFactory::create($_SESSION['user_id']);
        } elseif(isset($_COOKIE['user_id']) && isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $user = UserFactory::create($_COOKIE['user_id']);
            if($user->getEmail() == $_COOKIE['email'] && $user->getPassword() == $_COOKIE['password']) {
                $_SESSION['user_id'] = $user->getUserId();
                $this->user = $user;
            }
        }
    }
    
    function getUser() {
        return $this->user;
    }
    
}

?>
