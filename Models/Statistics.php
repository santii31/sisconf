<?php

namespace Models;

class Statistics{

    private $gain;
    private $loss;
    private $loss_percentage;
    private $monthly_savings;
    private $monthly_loss;
    private $saved_money;
    private $month_year;
    
    public function getGain(){
        return $this->gain;
    }

    public function getLoss(){
        return $this->loss;
    }

    public function getLossPercentage(){
        return $this->loss_percentage;
    }

    public function getMonthlySavings(){
        return $this->monthly_savings;
    }

    public function getMonthlyLoss(){
        return $this->monthly_loss;
    }

    public function getSavedMoney(){
        return $this->saved_money;
    }

    public function getMonthYear(){
        return $this->month_year;
    }

    public function setGain($gain){
        $this->user=$gain;
    }

    public function setLoss($loss){
        $this->loss=$loss;
    }

    public function setLossPercentage($loss_percentage){
        $this->loss_percentage=$loss_percentage;
    }

    public function setMonthlySavings($monthly_savings){
        $this->monthly_savings=$monthly_savings;
    }

    public function setMonthlyLoss($monthly_loss){
        $this->monthly_loss=$monthly_loss;   
    }

    public function setSavedMoney($saved_money){
        $this->saved_money=$saved_money;   
    }

    public function setMonthYear($month_year){
        $this->month_year=$month_year;   
    }
    

}

?>