<?php

class Controllers {
    
    protected $views, $models, $route;
    protected $user = null;

    function __construct($views, $models, $route) {
        // assert that the resources we need are there
        if(!defined('CONTROLLERS'))
            die();
        
        $this->views  = $views;
        $this->models = $models;
        $this->route  = $route;
        
        // logged in or not?
        if($this->user = $this->models->getUser()) {
            $this->views->addMenuItem('/Users/Logout/', 'Logout');
        }
    }
    
    function getUser() {
        return $this->user;
    }
   
}

?>
