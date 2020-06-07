<?php

    namespace Controllers;
    
    use Models\Bank as Bank;
    use Models\UserxBank as UserxBank;
    use DAO\BankDAO as BankDAO;   
    use DAO\UserxBankDAO as UserxBankDAO; 
    use Controllers\IncomeController as IncomeController;
    use Controllers\UserController as UserController;
    
    class BankController {

        private $incomeController;
        private $userController;
        private $bankDAO;
        private $userxbankDAO;

        public function __construct() {    
            $this->incomeController = new IncomeController();
            $this->userController = new UserController();
            $this->bankDAO = new BankDAO();
            $this->userxbankDAO = new UserxBankDAO();
        }
    	
        public function showLinksPath($alert = "", $success = "") {
                if($user = $this->userController->isLogged()){ 
                    $banks = $this->getBanks();       
                    $title = "HomeBankings";
                    require_once(VIEWS_PATH . "head.php");
                    require_once(VIEWS_PATH . "sidenav.php");
                    require_once(VIEWS_PATH . "homeBanking-links.php");
                    require_once(VIEWS_PATH . "footer.php");   
                }                 
			
        }

        public function register($names, $bankId, $userId, $userName, $password, $aux){
            
            $namesTemp = explode(",", $names);
            $count=0;
            $errorNames = array();
            $userxbank = new UserxBank();

            if($user = $this->userController->getById($userId)){
                for($i = 0; $i < count($bankId) ; $i++){
                    $userxbank->setIdUser($userId);
                    $userxbank->setIdBank($bankId[$i]);
                    if($this->userxbankDAO->add($userxbank)){
                        $count++;
                    }else{
                        $errorNames[$i] = $namesTemp[$i];
                    }
                }
                if($count != count($bankId)){
                    if($aux == 0){
                        $this->addBankPath($userId, $userName, $password, BANK_ERROR, null);
                    }else if($aux == 1){
                        $this->selectCreditCardPath(1, BANK_ERROR, null);
                    }else if($aux == 2){
                        $this->selectCreditCardPath(2, BANK_ERROR, null);
                    }else if($aux == 3){
                        $this->selectCreditCardPath(3, BANK_ERROR, null);
                    }
                        
                }else{
                    if($aux == 0){
                        $this->userController->login($userName , $password);
                    }else if($aux == 1){
                        $this->selectCreditCardPath(1, null, BANK_ADDED);
                    }else if($aux == 2){
                        $this->selectCreditCardPath(2, null, BANK_ADDED);
                    }else if($aux == 3){
                        $this->selectCreditCardPath(3, null, BANK_ADDED);
                    }
                    
                }        
            }else{
                if($aux == 0){
                    $this->addBankPath($userId, $userName, $password, DB_ERROR, null);
                }else if($aux == 1){
                    $this->selectCreditCardPath(1, DB_ERROR, null);
                }else if($aux == 2){
                    $this->selectCreditCardPath(2, DB_ERROR, null);
                }else if($aux == 3){
                    $this->selectCreditCardPath(3, BANK_ERROR, null);
                }
                
            }
            
        }
        
        public function selectCreditCardPath($aux, $alert = "", $success = "") {
            
            $userController = new UserController();
            if ($user = $userController->isLogged()) {
                $userId = $user->getId();
                $userName = null;
                $password = null;
                $userBanks = $this->getBanksByUserId($userId);
                $banks = $this->getFreeBanks($userId);
                
                
                $title = "Seleccione su banco";
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "select-credit-card.php");
                require_once(VIEWS_PATH . "footer.php");
			} else {                
                return $this->userPath();
			}
        }

        public function addBankPath($userId, $userName, $password, $alert=null, $success=null){

            $title = "Seleccione su banco";
            $banks = $this->getBanks();
            require_once(VIEWS_PATH . "head.php");
            require_once(VIEWS_PATH . "navbar.php");
            require_once(VIEWS_PATH . "add-bank-to-user.php");
            require_once(VIEWS_PATH . "footer.php");

        }
   
        public function getBanks() {
            return $this->bankDAO->getAll();
        }

        public function getById($id){
            $bank = new Bank();
            $bank->setId($id);
            return $this->bankDAO->getById($bank);
        }

        public function getBanksByUserId($userId) {
            return $this->userxbankDAO->getByUserId($userId);
        }

        public function getFreeBanks($id){
            $userBanks = $this->userxbankDAO->getByUserId($id);
            $banks = $this->getBanks();
            $freeBanks = array();
            $count=0;
            foreach($banks as $bank){
                foreach($userBanks as $uBank){
                    if(($bank->getId() != $uBank->getId())){
                        $count++;
                    }
                }
                if($count == count($userBanks)){
                    array_push($freeBanks, $bank);
                }
                $count=0;
            }
            return $freeBanks;
        }




    }

 ?>