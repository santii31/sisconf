<?php

namespace Models;

class Bank_account{

    private $bank_name;
    private $monthly_amount;
    private $id_user;

    public function getBankName(){
        return $this->bank_name;
    }

    public function getMonthlyAmount(){
        return $this->monthly_amount;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public setBankName($bank_name){
        $this->bank_name=$bank_name;
    }

    public setMonthlyAmount($monthly_amount){
        $this->monthly_amount=$monthly_amount;
    }

    public setIdUser($id_user){
        $this->id_user=$id_user;
    }
}

?>