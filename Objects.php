<?php
interface Person{
public function eat();
public function sleep();


}

class John implements Person{
    public function eat(){
        
    }
    public function sleep() {
        echo John::class;
    }
}


abstract class Model{
    private $id;
    public function getId(){
        $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
}
 


class User extends Model{
    private $username;
    private $password;
            
}

function getUsername() {
    return $this->username;
}
 function getPassword() {
    return $this->password;
}

 function setUsername($username) {
    $this->username = $username;
}

 function setPassword($password) {
    $this->password = $password;
}

 //public function login(){
    
//}



class TaskDb {
    public function create(){
        
    }
}



class ProcessRequest{
    public function init(){
        $page= $_GET['page'];
        $action = $_GET['login'];
        
        $classname = ucfirst($page);
        $classname = substr($classname, 0 , -1);
    
        $user = new $classname();
        $user->$action();
    }
}


