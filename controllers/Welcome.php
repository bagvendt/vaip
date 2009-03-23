<?php

class Welcome extends Controllers {
    
    function index() {
        if($user = $this->models->getUser()) {
            echo 'Welcome '. $this->models->getUser()->getEmail();
            $this->views->flush('body');
        } else {
            header('location: /Users/Login/');
        }
    }

}

?>
    