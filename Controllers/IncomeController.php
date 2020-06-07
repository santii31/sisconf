<?php

    namespace Controllers;
    
    use Models\Income as Income; 
    use Models\User as User;
    use DAO\IncomeDAO as IncomeDAO;
    use Controllers\UserController as UserController; 
    use Controllers\BankController as BankController;   
    use Controllers\CheckController as CheckController;   
    
    class IncomeController {

        private $incomeDAO;

        public function __construct() {            
            $this->incomeDAO = new IncomeDAO();
        }

         
                 
        
    	private function add($currency, $amount, $reason, $date, $payment_method, $userId) {
            
            
            $currency_s = filter_var($currency, FILTER_SANITIZE_STRING);
            $reason_s = filter_var($reason, FILTER_SANITIZE_STRING);
            $payment_method_s = filter_var($payment_method, FILTER_SANITIZE_STRING);

			$income = new Income();
            $income->setAmount($amount);
            $income->setCurrency( strtolower($currency_s) );
            $income->setReason( strtolower($reason_s) );
            $income->setPaymentMethod( strtolower($payment_method_s) );
            $income->setDate($date);
            $income->setIdUser($userId);		

            
            if ($lastId = $this->incomeDAO->add($income)) {
                return $lastId;
            } else {
                return false;
            }
        }

        
  
        public function addCashIncomePath($alert = "", $success = "", $inputs = array()) {
            $userController = new UserController();
            if ($user = $userController->isLogged()) {                                    
                $title = "Ingreso - Efectivo";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "add-cash-income.php");
                require_once(VIEWS_PATH . "footer.php");                    
			} else {                
                return $this->userPath();
			}
        }

        public function addBankDeposithPath($bankName, $bankId, $alert = "", $success = "", $inputs = array()) {
            $userController = new UserController();
            if ($user = $userController->isLogged()) {     

                $title = "Ingreso - Deposito";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "add-bank-deposit.php");
                require_once(VIEWS_PATH . "footer.php");  

			} else {                
                return $this->userPath();
			}
        }

        public function showIncome($currency, $amount, $reason, $date, $payment_method, $bankId=null, $checkId=null){
            $userController = new UserController();
            $bankController = new BankController();
            $bankName = null;
            if ($user = $userController->isLogged()) {  
                
                if($bankId != null){
                    $bank = $bankController->getById($bankId);
                    $bankName = $bank->getName();
                }

                $title = "Ingreso registrado con éxito";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "show-income-card.php");
                require_once(VIEWS_PATH . "footer.php");  

			} else {                
                return $this->userPath();
            }
        }




        public function addIncome($currency, $amount, $reason, $date, $payment_method, $userId, $bankId=null, $checkId=null, $checkInputs=null) {
           
            $checkController = new CheckController();

            // Saves the inputs in case of validation error
            if($payment_method == "bank_deposit"){
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
                    if($payment_method == "bank_deposit"){
                        if($this->incomeDAO->addBank($lastId, $bankId)){
                            return $this->showIncome($currency, $amount, $reason, $date, $payment_method, $bankId, null);
                        }else{
                            return $this->addBankDeposithPath(DB_ERROR, null, $inputs);
                        }
                    }else if($payment_method == "cash"){
                        return $this->showIncome($currency, $amount, $reason, $date, $payment_method, null, null);
                    }else if($payment_method == "check"){
                        if($this->incomeDAO->addCheck($lastId, $checkId)){
                            if($this->incomeDAO->addBank($lastId, $bankId)){
                                return $this->showIncome($currency, $amount, $reason, $date, $payment_method, $bankId, $checkId);
                            }else{
                                
                                return $checkController->addCheckIncomePath(DB_ERROR, null, $inputs);    
                            }
                        }else{
                            return $checkController->addCheckIncomePath(DB_ERROR, null, $inputs);
                        }
                        
                    }
                    
                } else {             
                    if($payment_method == "bank_deposit"){
                        return $this->addBankDeposithPath(DB_ERROR, null, $inputs);
                    }else if($payment_method == "cash"){
                        return $this->addCashIncomePath(DB_ERROR, null, $inputs);
                    }else if($payment_method == "check"){
                        return $checkController->addCheckIncomePath(DB_ERROR, null, $inputs);
                    }                   
                }
            }           
            if($payment_method == "bank_deposit"){
                return $this->addBankDeposithPath(EMPTY_FIELDS, null, $inputs);
            }else if($payment_method == "cash"){
                return $this->addCashIncomePath(EMPTY_FIELDS, null, $inputs);
            }else if($payment_method == "check"){
                return $checkController->addCheckIncomePath(EMPTY_FIELDS, null, $inputs);
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