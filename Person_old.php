<?php

//3. Objects

class Person {
private $age;
private $firstname;
private $lastname;
private $gender;
private $personalid;


        
function _construct($age, $firstname, $lastname ){
$this->age = $age;
}

function _destruct(){

}




public function eat(){
echo 'eating';
}
public function sleeps(){
echo 'sleeping';
}
public function isdrinkingbeer(){
if ($this->age >=18){

return true;
}

return false;

}

public function setAge($age){
$this->age =$age; 

}


public function getAge(){

return $this->age;
}


}


class OfficePerson extends Person {
    
    private $profession;
    
    public function  calculateSalary() {
        $this->eat();
        
    }
}



class Director extends OfficePerson{
    
    private $manages;
    private $salary;
    
}

//singleten

class Math{
    public static function add($a, $b){
        return $a  + $b;
    }
    
}

echo Math::add(4, 5);

$Ivan = new Person(18,'Ivan','Ivanov');


//$Ivan = new Person();  //референция към обект

$Ivan->setAge(18);  //достъпва Иван

//$Ivan->isdrinkingbeer();

//$Ivan2 = $Ivan;
//$Ivan = null;


function test($Person){

}
//test($Ivan);

//$this turns to the object in whith is exists.
//self:: -Static field/method in the same class
//parent:: -Static  field/method in the parent