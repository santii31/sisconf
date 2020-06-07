<?php

    namespace Controllers;
    
    use Models\Buy_credit as Buy_credit; 
    use DAO\BuyCreditDAO as BuyCreditDAO;
    use Controllers\OutflowController as OutflowController; 
    use Controllers\UserController as UserController;    
    
    class BuyCreditController {

        private $buyCreditDAO;

        public function __construct() {            
            $this->buyCreditDAO = new BuyCreditDAO();
        }

         
                 
        
    	private function add($currency, $amount, $fees, $date, $reason, $monthlyFee, $bankId, $userId) {


            $currency_s = filter_var($currency, FILTER_SANITIZE_STRING);
            $reason_s = filter_var($reason, FILTER_SANITIZE_STRING);

            if(substr($monthlyFee, 0, -11) == date("F")){
                $remaining_fees = $fees - 1;
            }else{
                $remaining_fees = $fees;
            }

            $buy_credit = new Buy_Credit();
            $buy_credit->setCurrency( strtolower($currency_s) );
            $buy_credit->setAmount($amount);
            $buy_credit->setFees($fees);
            $buy_credit->setRemainingFees($remaining_fees);
            $buy_credit->setMonthlyFee($monthlyFee);
            $buy_credit->setDate($date);
            $buy_credit->setReason( strtolower($reason_s) );
            $buy_credit->setIdBank($bankId);
            $buy_credit->setIdUser($userId);		

            
            if ($this->buyCreditDAO->add($buy_credit)) {
                return true;
            } else {
                return false;
            }
        }


        public function addBuyCredit($currency, $amount, $fees, $date, $reason, $monthlyFee, $bankId, $bankName, $userId) {
            
            echo $currency . " moneda|";
            echo $amount . " monto|";
            echo $fees . " cuotas|";
            echo $date . " fecha|";
            echo $reason . " motivo|";
            echo $monthlyFee . " mes primer cuota|";
            echo $bankId . " id banco|";
            echo $userId . " id user|";

            // Saves the inputs in case of validation error
            $outflowController = new OutflowController();

            $inputs = array(
                "currency" => $currency,
                "amount" => $amount,
                "fees"=> $fees, 
                "date"=> $date,
                "reason" => $reason,
                "monthlyFee" => $monthlyFee,
                "bankId" => $bankId,
                "userId" => $userId
            );    
            
            if ($this->isFormRegisterNotEmpty($currency, $amount, $fees, $date, $reason, $monthlyFee, $bankId, $userId)) {
                
                                                                           
                if ($this->add($currency, $amount, $fees, $date, $reason, $monthlyFee, $bankId, $userId)) {            

                    return $this->addCreditOutflowPath($bankName, $bankId, null, CREDIT_ADDED, $inputs);
                    
                } else {             

                    return $this->addCreditOutflowPath($bankName, $bankId, DB_ERROR, null, $inputs);
                                      
                }
            }           
            return $this->addCreditOutflowPath($bankName, $bankId, EMPTY_FIELDS, null, $inputs);
                  
        }

    public function isFormRegisterNotEmpty($currency, $amount, $fees, $date, $reason, $monthlyFee, $bankId, $userId){
        if (empty($currency) || 
            empty($amount) || 
            empty($fees) || 
            empty($date) ||
            empty($reason) ||
            empty($monthlyFee) ||
            empty($bankId) ||
            empty ($userId)) {
                return false;
        }
        return true;
    }    

    public function addCreditOutflowPath($bankName, $bankId, $alert = "", $success = "", $inputs = array()){
        $userController = new UserController();
        if ($user = $userController->isLogged()) {     

            $title = "Egreso - Credito";
            require_once(VIEWS_PATH . "head.php");
            require_once(VIEWS_PATH . "sidenav.php");
            require_once(VIEWS_PATH . "add-credit-outflow.php");
            require_once(VIEWS_PATH . "footer.php");  

        } else {                
            return $this->userPath();
        }
    }

        

    }

 ?>