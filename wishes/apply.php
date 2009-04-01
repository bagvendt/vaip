<?php


       require_once 'WishFactory.php';
       require_once '../Models.php';
       define('MODELS', 'models');
       $models = new Models('localhost', 'fadl', 'vaip', 'fadl');

       WishFactory::applyAll(1230768000, 1233273600);
       WishFactory::commitSchema(1230768000, 1233273600);

       echo "ALL DONE";





?>
