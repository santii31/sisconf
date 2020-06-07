<?php

namespace Models;

class UserxBank{

    private $id_user;
    private $id_bank;

    public function getIdUser(){
        return $this->id_user;
    }

    public function getIdBank(){
        return $this->id_bank;
    }

    public function setIdBank($id_bank){
        $this->id_bank=$id_bank;
    }

    public function setIdUser($id_user){
        $this->id_user=$id_user;   
    }

}

?>