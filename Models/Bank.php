<?php

namespace Models;

class Bank{

    private $id;
    private $name;
    private $homeBankingLink;
    
    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }

    public function getHomeBankingLink(){
        return $this->homeBankingLink;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function setHomeBankingLink($homeBankingLink){
        $this->homeBankingLink=$homeBankingLink;
    }
}

?>