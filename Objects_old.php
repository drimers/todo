<?php

abstract class Carrier {
    
public function  takePackage(){
    
}
public abstract function delivery();


}


class Postman extends Carrier{
    
    public function delivery() {
      echo 'puts mails in mailboxes';  
    }
}


class Newsman extends Carrier{
    public function delivery() {
        echo 'throw the papper in the front of doors.';
    }
}




class Vehicle {

    private $numberOfWeels;
    private $color;
    private $breakeType;
    private $namberOfGears;
    private $brand;
    private $model;
    
    function getModel() {
        return $this->model;
    }

    function setModel($model) {
        $this->model = $model;
    }

                
    function getBrand() {
        return $this->brand;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

                
    function getNumberOfWeels() {
        return $this->numberOfWeels;
    }

    function getColor() {
        return $this->color;
    }

    function getBreakeType() {
        return $this->breakeType;
    }

    function getNamberOfGears() {
        return $this->namberOfGears;
    }

    

    function setNumberOfWeels($numberOfWeels) {
        $this->numberOfWeels = $numberOfWeels;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setBreakeType($breakeType) {
        $this->breakeType = $breakeType;
    }

    function setNamberOfGears($namberOfGears) {
        $this->namberOfGears = $namberOfGears;
    }

    

}



class Car extends Vehicle{
    
    private $engine;
    private $carType;
    private $numberOfDoors;
    private $brand;
}

function getBrand() {
    return $this->brand;
}

 function setBrand($brand) {
    $this->brand = $brand;
}



function getCarType() {
    return $this->carType;
}

 function getNumberOfDoors() {
    return $this->numberOfDoors;
}

 function setCarType($carType) {
    $this->carType = $carType;
}

 function setNumberOfDoors($numberOfDoors) {
    $this->numberOfDoors = $numberOfDoors;
}



function getEngine() {
    return $this->engine;
}

 function setEngine($engine) {
    $this->engine = $engine;
}


