<?php

class Views {

    private $menu = array();
    
    function __construct() {
        // assert that the resources we need are there
        if(!defined('VIEWS'))
            die();
        
        ob_start();
    }
    
    function populate($layer, $population) {
        $this->{$layer} = $population;
    }
    
    function flush($buffer, $partial = null) {
        if($partial != null) {
            require_once VIEWS .'/'. $partial .'.php';
            $this->{$buffer} = eval('return $'. $partial .';');
        } else {
            $this->{$buffer} = ob_get_contents();
        }
        ob_clean();
    }
    
    function render() {
        foreach($this->menu as $menu_item) {
            echo '<a href="'. $menu_item['href'] .'">'. $menu_item['label'] .'</a>';
        }
        $this->flush('menu');
        require_once VIEWS .'/layout.php';
        echo $layout;
        ob_end_flush();
    }
    
    function addMenuItem($href, $label) {
        array_push($this->menu, array('href' => $href, 'label' => $label));
    }

}

?>
