<?php

class Welcome extends Controllers {
    
    function index() {
        if($user = $this->models->getUser()) {
        } else {
            header('location: /Users/Login/');
        }
    }

}

?>
    