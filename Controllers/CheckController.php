<?php

    namespace Controllers;
    
    use Models\Check as Check; 
    use DAO\CheckDAO as CheckDAO;
    use Controllers\IncomeController as IncomeController; 
    use Controllers\UserController as UserController;
    use Controllers\BankController as BankController;     
    
    class CheckController {

        private $checkDAO;

        public function __construct() {            
            $this->checkDAO = new CheckDAO();
        }

         
                 
        
    	private function add($currency, $amount, $contributor, $date_of_issue, $expiration_date, $bankId, $userId) {

            $currency_s = filter_var($currency, FILTER_SANITIZE_STRING);
            $contributor_s = filter_var($contributor, FILTER_SANITIZE_STRING);

            $check = new Check();
            $check->setCurrency( strtolower($currency_s) );
            $check->setAmount($amount);
            $check->setContributor( strtolower($contributor_s) );
            $check->setDateOfIssue($date_of_issue);
            $check->setExpirationDate($expiration_date);
            $check->setIdBank($bankId);
            $check->setIdUser($userId);		

            
            if ($lastId = $this->checkDAO->add($check)) {
                
                return $lastId;
            } else {
                return false;
            }
        }


        public function addCheck($currency, $amount, $contributor, $date_of_issue, $expiration_date, $bankName, $bankId, $userId) {
            
            // Saves the inputs in case of validation error
            $incomeController = new IncomeController();

            $inputs = array(
                "currency" => $currency,
                "amount" => $amount,
                "contributor"=> $contributor, 
                "date_of_issue"=> $date_of_issue,
                "expiration_date" => $expiration_date
            );    
            
            if ($this->isFormRegisterNotEmpty($currency, $amount, $contributor, $date_of_issue, $expiration_date, $bankId, $userId)) {
                
                
                                                                           
                if ($lastId = $this->add($currency, $amount, $contributor, $date_of_issue, $expiration_date, $bankId, $userId)) {            
                    
                    return $incomeController->addIncome($currency, $amount, $contributor, $date_of_issue, "check", $userId, $bankId, $lastId, $inputs);
                    
                } else {             

                    return $this->addCheckIncomePath(DB_ERROR, null, $inputs);
                                      
                }
            }           
            return $this->addCheckIncomePath(EMPTY_FIELDS, null, $inputs);
                  
        }

    public function isFormRegisterNotEmpty($currency, $amount, $contributor, $date_of_issue, $expiration_date, $bankId, $userId){
        if (empty($currency) || 
            empty($amount) || 
            empty($contributor) || 
            empty($date_of_issue) ||
            empty($expiration_date) ||
            empty($bankId) ||
            empty($userId)) {
                return false;
        }
        return true;
    }    
    
    public function addCheckIncomePath($alert = "", $success = "", $inputs = array()) {
        $userController = new UserController();
        $bankController = new BankController();
        if ($user = $userController->isLogged()) {        
            $Banks = $bankController->getBanks();                            
            $title = "Ingreso - Cheque";
            require_once(VIEWS_PATH . "head.php");
            require_once(VIEWS_PATH . "sidenav.php");
            require_once(VIEWS_PATH . "add-check-income.php");
            require_once(VIEWS_PATH . "footer.php");                    
        } else {                
            return $this->userPath();
        }
    }

        

    }

 ?>