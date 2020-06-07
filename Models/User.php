<?php

namespace Models;

class User{

    private $id;
    private $userName;
    private $password;
    private $name;
    private $lastName;
    private $isActive;

    public function getId(){
        return $this->id;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getName(){
        return $this->name;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getIsActive(){
        return $this->isActive;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setUserName($userName){
        $this->userName=$userName;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function setLastName($lastName){
        $this->lastName=$lastName;
    }

    public function setIsActive($isActive){
        $this->isActive=$isActive;   
    }

}

?>