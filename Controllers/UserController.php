<?php

    namespace Controllers;
    
    use Models\User as User;        
    use DAO\UserDAO as UserDAO;
    use Controllers\BankController as BankController;

    class UserController {

        private $userDAO;
        private $bankController;

        public function __construct() {            
            $this->userDAO = new UserDAO();
            
        }

         
                 
        
    	private function add($name, $lastName, $userName, $passwordHash) {
            
            $name_s = filter_var($name, FILTER_SANITIZE_STRING);
            $lastname_s = filter_var($lastName, FILTER_SANITIZE_STRING);
            $userName_s = filter_var($userName, FILTER_SANITIZE_STRING);

			$user = new User();
            $user->setName( strtolower($name_s) );
            $user->setLastName( strtolower($lastname_s) );
            $user->setUserName($userName_s);
            $user->setPassword($passwordHash);		
            
            
            if ($lastId = $this->userDAO->add($user)) {
                return $lastId;
            } else {
                return false;
            }
        }

        
  
        public function addUserPath($alert = "", $success = "", $inputs = array()) {
                                                   
            $title = "Ingrese sus datos";
            require_once(VIEWS_PATH . "head.php");
            require_once(VIEWS_PATH . "navbar.php");
            require_once(VIEWS_PATH . "add-user.php");
            require_once(VIEWS_PATH . "footer.php");                    

        }


        public function register($name, $lastName, $userName, $password) {

            $bankController = new BankController();
            // Saves the inputs in case of validation error
            $inputs = array(
                "name"=> $name, 
                "lastName"=> $lastName,
                "userName"=> $userName
            );

			if ($this->isFormRegisterNotEmpty($name, $lastName, $userName, $password)) {     
                $userTemp = new User();
                $userTemp->setUserName($userName);
				if ($this->userDAO->getByUserName($userTemp) == null) {                    
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);                        
                    if ($lastId = $this->add($name, $lastName, $userName, $passwordHash)) {  
                        return $bankController->addBankPath($lastId, $userName, $password);         
                    } else {         
                        return $this->addUserPath(DB_ERROR, null, $inputs);        
                    }
                }                
                return $this->addUserPath(REGISTER_ERROR, null, $inputs);
            }            
            return $this->addUserPath(EMPTY_FIELDS, null, $inputs);
		}

        private function isFormRegisterNotEmpty($name, $lastName, $userName, $password) {
            if (empty($name) || 
                empty($lastName) || 
                empty($userName) || 
                empty($password)) {
                    return false;
            }
            return true;
        }

        private function isFormUpdateNotEmpty($name, $lastName, $userName) {
            if (empty($name) || 
                empty($lastName) || 
                empty($userName)) {
                    return false;
            }
            return true;
        }
        
        public function validateUserNameForm($userName) {
            return (filter_var($userName, FILTER_SANITIZE_STRING));
        } 

        public function login($userName, $password) {
            
            if ($this->isFormLoginNotEmpty($userName, $password) && $this->validateUserNameForm($userName)) {
                
                $userTemp = new User();
                $userTemp->setUserName($userName);
                
                $user = $this->userDAO->getByUserName($userTemp); 
                
                                                                     
                if (($user != null) && (password_verify($password, $user->getPassword()))) {
                    
                    if ($user->getIsActive()) {
                        $_SESSION["loggedUser"] = $user;                        
                        return $this->dashboard();                        
                    } else {
                        return $this->userPath(ACCOUNT_DISABLE);        
                    }
                }
                return $this->userPath(LOGIN_ERROR);
            }
            return $this->userPath(EMPTY_FIELDS);
        }        

        private function isFormLoginNotEmpty($userName, $password) {
            if (empty($userName) || empty($password)) {
                return false;
            }
            return true;
        }       

        public function dashboard($alert=null, $success=null) {
            if ($user = $this->isLogged()) {    
                $title = "santi";           
                       
                require_once(VIEWS_PATH . "head.php");
                require_once(VIEWS_PATH . "sidenav.php");
                require_once(VIEWS_PATH . "footer.php");            
            } else {
                return $this->userPath();
            }
        }        

        public function userPath($alert = "") {
			$this->homeController = new HomeController();
			return $this->homeController->Index($alert);
        }        

        public function isLogged() {
            if (isset($_SESSION["loggedUser"])) {
                return $_SESSION["loggedUser"];
            }
            return false;
        }

        public function logout() {
            $_SESSION["loggedUser"] = null;
            $_SESSION = [];
            session_destroy();            
			return $this->userPath();
        }       

        public function getById($id){
            $user = new User();
            $user->setId($id);
            return $this->userDAO->getById($user);
        }
        
        
        
        
        

    }

 ?>