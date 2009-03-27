<?php

class Schemas extends Controllers {

    function index() {
        if($user = $this->models->getUser())
        {

            $this->views->flush('body', 'month');

        } else {
            header('location: /Users/Login/');
        }
    }

    function shift()
    {
       if($user = $this->models->getUser())
        {
            //fix date format
            $shift = ShiftFactory::createShift(1230681600 + 86400 * $this->route->getParam(3),0);
            $this->views->populate('shift', $shift);
            $this->views->flush('body', 'shift');

        } else {
            header('location: /Users/Login/');
        }
    }

    
    
}
?>
