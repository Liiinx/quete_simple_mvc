<?php

require __DIR__ . '/../vendor/autoload.php';


//require __DIR__ . '/../src/Controller/ItemController.php';
use Controller\ItemController;

$index = new ItemController();
echo $index->index();


?>