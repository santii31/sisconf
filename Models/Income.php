<?php

namespace Models;

class Income{

    private $amount;
    private $currency;
    private $date;
    private $reason;
    private $paymeny_method;
    private $id_user;
    private $id_bank;
    private $id_check;

    public function getAmount(){
        return $this->amount;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function getDate(){
        return $this->date;
    }

    public function getReason(){
        return $this->reason;
    }

    public function getPaymentMethod(){
        return $this->payment_method;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function getIdBank(){
        return $this->id_bank;
    }

    public function getIdCheck(){
        return $this->id_check;
    }

    public function setAmount($amount){
        $this->amount=$amount;
    }

    public function setCurrency($currency){
        $this->currency=$currency;
    }

    public function setDate($date){
        $this->date=$date;
    }

    public function setReason($reason){
        $this->reason=$reason;
    }

    public function setPaymentMethod($paymeny_method){
        $this->payment_method=$paymeny_method;
    }

    public function setIdUser($id_user){
        $this->id_user=$id_user;
    }

    public function setIdBank($id_bank){
        $this->id_bank=$id_bank;
    }

    public function setIdCheck($id_check){
        $this->id_check=$id_check;
    }
}

?>