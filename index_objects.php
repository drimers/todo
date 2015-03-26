<?php

require './Objects.php';


$mercedesC200 = new Car();
$mercedesC200->setBrand('Mercedes');
$mercedesC200->setModel('C200');
$mercedesC200->setBreakeType('Disc');
//$mercedesC200->setCarType('Sedan');
$mercedesC200->setColor('silver');
        

$Dacia = new Car();
$Dacia->setBrand('Dacia');
$Dacia->setModel('Logan');
$Dacia->setBreakeType('Disc');
//$Dacia->setCarType('Sedan');
$Dacia->setColor('silver');        
        
        echo 'Car 1: <br />';
        echo 'Brand: '. $mercedesC200->getBrand() . '<br />';
        echo 'Brand: '. $mercedesC200->getColor() . '<br />';
        
        
 //$obj = new stdClass();       
        