<?php

$profile = <<<PROFILE

<h1>{$this->profile->getName()}</h1>

<table>

    <tr>
    
        <td>Address:</td>
        <td>{$this->profile->getAddress()}</td>

    </tr>
    
    <tr>
    
        <td>Phone:</td>
        <td>{$this->profile->getPhone()}</td>

    </tr>
    
</table>

PROFILE;

?>
