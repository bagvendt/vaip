<?php

class Users extends Controllers {
    
    function index() {
        if($user = $this->models->getUser()) {
            //..
        } else {
            header('location: /Users/Login/');
        }
    }
    
    function Login() {
        if(isset($_POST['submit'])) {
            if($user = UserFactory::login($_POST['email'], md5($_POST['password']))) {
                setcookie('user_id', $user->getUserId(), time() + 3600, '/');
                setcookie('email', $user->getEmail(), time() + 3600, '/');
                setcookie('password', $user->getPassword(), time() + 3600, '/');
                header('location: /Welcome/');
            }
        }
        $this->views->flush('body', 'login');
    }
    
    function Logout() {
        setcookie('user_id', '', time() - 3600, '/');
        setcookie('email', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
        unset($_SESSION['user_id']);
        header('location: /Welcome/');
    }
    
    function Profile() {
        $employee = $this->user->getEmployee();
        $this->views->populate('profile', $employee);
        $this->views->flush('body', 'profile');
    }
    
}

?>
