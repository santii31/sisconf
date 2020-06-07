<?php

    namespace Controllers;
    
    use Models\Outflow as Outflow; 
    use Models\User as User;
    use DAO\OutflowDAO as OutflowDAO;
    use Controllers\UserController as UserController; 
    use Controllers\BankController as BankController;   
    use Controllers\CheckController as CheckController;   
    
    class OutflowController {

        private $outflowDAO;

        public function __construct() {            
            $this->outflowDAO = new OutflowDAO();
        }

         
                 
        
    	private function add($currency, $amount, $reason, $date, $payment_method, $userId) {
            
            
            $currency_s = filter_var($currency, FILTER_SANITIZE_STRING);
            $reason_s = filter_var($reason, FILTER_SANITIZE_STRING);
            $payment_method_s = filter_var($payment_method, FILTER_SANITIZE_STRING);

			$outflow = new Outflow();
            $outflow->setAmount($amount);
            $outflow->setCurrency( strtolower($currency_s) );
            $outflow->setReason( strtolower($reason_s) );
            $outflow->setPaymentMethod( strtolower($payment_method_s) );
            $outflow->setDate($date);
            $outflow->setIdUser($userId);		

            
            if ($lastId = $this->outflowDAO->add($outflow)) {
                return $lastId;
            } else {
                return false;
            }
        }

        

        
  
        public function addCashOutflowPath($alert = "", $success = "", $inputs = array()) {
            $userController = new UserController();
            if ($user = $userController->isLogged()) {                                    
                $title = "Egreso - Efectivo";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "add-cash-outflow.php");
                require_once(VIEWS_PATH . "footer.php");                    
			} else {                
                return $this->userPath();
			}
        }

        public function addDebitOutflowPath($bankName, $bankId, $alert = "", $success = "", $inputs = array()) {
            $userController = new UserController();
            if ($user = $userController->isLogged()) {     

                $title = "Egreso - Debito";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "add-debit-outflow.php");
                require_once(VIEWS_PATH . "footer.php");  

			} else {                
                return $this->userPath();
			}
        }

        public function showOutflow($currency, $amount, $reason, $date, $payment_method, $bankId=null, $checkId=null){
            $userController = new UserController();
            $bankController = new BankController();
            $bankName = null;
            if ($user = $userController->isLogged()) {  
                
                if($bankId != null){
                    $bank = $bankController->getById($bankId);
                    $bankName = $bank->getName();
                }

                $title = "Egreso registrado con éxito";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "show-outflow-card.php");
                require_once(VIEWS_PATH . "footer.php");  

			} else {                
                return $this->userPath();
            }
        }


        public function addOutflow($currency, $amount, $reason, $date, $payment_method, $userId, $bankId=null, $checkId=null, $checkInputs=null) {
           
            $checkController = new CheckController();

            // Saves the inputs in case of validation error
            if($payment_method == "debit"){
                $inputs = array(
                    "currency" => $currency,
                    "amount" => $amount,
                    "contributor"=> $reason, 
                    "date"=> $date
                );    
            }else if($payment_method == "cash"){
                $inputs = array(
                    "currency" => $currency,
                    "amount" => $amount,
                    "reason"=> $reason, 
                    "date"=> $date
                );
            }else if($payment_method == "check"){
                $inputs = $checkInputs;
            }
            
            
            if ($this->isFormRegisterNotEmpty($currency, $amount, $reason, $date, $payment_method, $userId)) {
                                                                           
                if ($lastId = $this->add($currency, $amount, $reason, $date, $payment_method, $userId)) {            
                    if($payment_method == "debit"){
                        if($this->outflowDAO->addBank($lastId, $bankId)){
                            return $this->showOutflow($currency, $amount, $reason, $date, $payment_method, $bankId, null);
                        }else{
                            return $this->addDebitOutflowPath(DB_ERROR, null, $inputs);
                        }
                    }else if($payment_method == "cash"){
                        return $this->showOutflow($currency, $amount, $reason, $date, $payment_method, null, null);
                    }
                    
                } else {             
                    if($payment_method == "bank_deposit"){
                    }else if($payment_method == "cash"){
                        return $this->addCashOutflowPath(DB_ERROR, null, $inputs);
                    }else if($payment_method == "check"){
                    }                   
                }
            }           
            if($payment_method == "bank_deposit"){
            }else if($payment_method == "cash"){
                return $this->addCashOutflowPath(EMPTY_FIELDS, null, $inputs);
            }else if($payment_method == "check"){
            }          
        }

    public function isFormRegisterNotEmpty($currency, $amount, $reason, $date, $payment_method, $id_user){
        if (empty($currency) || 
            empty($amount) || 
            empty($reason) || 
            empty($date) ||
            empty($payment_method) ||
            empty($id_user)) {
                return false;
        }
        return true;
    }            

        

    }

 ?>