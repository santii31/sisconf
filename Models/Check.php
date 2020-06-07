<?php

namespace Models;

class Check{

    private $id;
    private $idBank;
    private $idUser;
    private $currency;
    private $amount;
    private $contributor;
    private $dateOfIssue;
    private $expirationDate;
    
    public function getId(){
        return $this->id;
    }
    
    public function getIdBank(){
        return $this->idBank;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getContributor(){
        return $this->contributor;
    }

    public function getDateOfIssue(){
        return $this->dateOfIssue;
    }

    public function getExpirationDate(){
        return $this->expirationDate;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setIdBank($idBank){
        $this->idBank=$idBank;
    }

    public function setIdUser($idUser){
        $this->idUser=$idUser;
    }

    public function setCurrency($currency){
        $this->currency=$currency;
    }

    public function setAmount($amount){
        $this->amount=$amount;
    }

    public function setContributor($contributor){
        $this->contributor=$contributor;
    }

    public function setDateOfIssue($dateOfIssue){
        $this->dateOfIssue=$dateOfIssue;
    }

    public function setExpirationDate($expirationDate){
        $this->expirationDate=$expirationDate;
    }

}

?>