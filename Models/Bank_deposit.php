
<?php

namespace Models;

class Bank_deposit{

    private $contributor;
    private $amount;
    private $currency;
    private $date;
    private $id_bank_account;

    public function getContributor(){
        return $this->contributor;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getCurrency(){
        return $this->amount;
    }

    public function getDate(){
        return $this->date;
    }

    public function getIdBankAccount(){
        return $this->amount;
    }

    public setContributor($contributor){
        $this->contributor=$contributor;
    }

    public setAmount($amount){
        $this->amount=$amount;
    }

    public setCurrency($currency){
        $this->currency=$currency;
    }

    public setDate($date){
        $this->date=$date;
    }

    public setIdBankAccount($id_bank_account){
        $this->id_bank_account=$id_bank_account;
    }
}

?>