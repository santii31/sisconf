<?php

namespace Models;

class Buy_credit{

    private $id;
    private $currency;
    private $amount;
    private $fees;
    private $remaining_fees;
    private $monthly_fee;
    private $date;
    private $reason;
    private $id_user;
    private $id_bank;

    public function getId(){
        return $this->id;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getFees(){
        return $this->fees;
    }

    public function getRemainingFees(){
        return $this->remaining_fees;
    }

    public function getMonthlyFee(){
        return $this->monthly_fee;
    }

    public function getDate(){
        return $this->date;
    }

    public function getReason(){
        return $this->reason;
    }

    public function getIdBank(){
        return $this->id_bank;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setCurrency($currency){
        $this->currency=$currency;
    }

    public function setAmount($amount){
        $this->amount=$amount;
    }

    public function setFees($fees){
        $this->fees=$fees;
    }

    public function setRemainingFees($remaining_fees){
        $this->remaining_fees=$remaining_fees;
    }

    public function setMonthlyFee($monthly_fee){
        $this->monthly_fee=$monthly_fee;
    }

    public function setDate($date){
        $this->date=$date;
    }

    public function setReason($reason){
        $this->reason=$reason;
    }

    public function setIdBank($id_bank){
        $this->id_bank=$id_bank;
    }

    public function setIdUser($id_user){
        $this->id_user=$id_user;
    }
}

?>