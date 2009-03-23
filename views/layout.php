<?php

$layout = <<<LAYOUT

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>

    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="/css/vaip.css" type="text/css" media="screen" /> 

        <title>VAIP</title>
    
    </head>
    
    <body>
    
        <div class="center">
    
            <div id="dashboard">
            
                <div id="logo">VAIP</div>
                
                <div id="menu">{$this->menu}</div>
            
            </div>
        
            <div>{$this->body}</div>
        
        </div>
        
    </body>

</html>

LAYOUT;

?>