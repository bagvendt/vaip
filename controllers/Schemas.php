<?php

class Schemas extends Controllers {

    function index() {
        if($user = $this->models->getUser())
        {
            $employee = $this->user->getEmployee();
            $this->views->populate('employee', $employee);
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
            $shift = ShiftFactory::createShift($this->route->getParam(3),$this->route->getParam(4));
            $this->views->populate('shift', $shift);
            $this->views->flush('body', 'shift');

        } else {
            header('location: /Users/Login/');
        }
    }

    
    
}
?>
