<?php


         require_once 'rule.php';
         require_once 'OneGreen.php';
         require_once 'OneYellow.php';
         require_once 'twoNV.php';
         require_once 'leastGreen.php';
         require_once 'leastYellow.php';

       
        //NOTE: reglerne er ikke helt rigtige endnu. OneGreen/Yellow skal tjekke om der er mulighed for link

        $rule = array();
        $rule[0] = new OneGreen('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[1] = new OneYellow('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[2] = new twoNV('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[3] = new leastGreen('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        $rule[4] = new leastYellow('localhost', 'fadl', 'vaip', 'fadl') or die("mysql_error()");
        
        $more = true;

        $i = 0;
        while($more)
        {
            
            if($rule[$i]->apply())
            {
                $i = 0;

            } elseif ($i >= count($rule))
            {
                $more = false;
            } else
            {
                $i += 1;
            }
            
            
        }

        echo "ALL DONE";





?>
