<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rule
 *
 * @author essif
 */
abstract class rule {

     private $dbhost, $dbuser, $dbpswd, $dbname, $user;

     function __construct($dbhost, $dbuser, $dbpswd, $dbname)
     {
         // Database
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpswd = $dbpswd;
        $this->dbname = $dbname;

        mysql_connect($this->dbhost, $this->dbuser, $this->dbpswd, $this->dbname);
        mysql_select_db($this->dbname);
     }

     abstract public function apply($startDate, $endDate);
   
}
?>
