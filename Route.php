<?php

class Route {
    
    var $uri;
    
    function __construct($uri) {
        $this->uri = explode('/', $uri);        
    }
    
    function getParam($index) {
        if(sizeof($this->uri) > $index) {
            return $this->uri[$index];
        } else {
            return false;
        }
    }
    
}

?>
