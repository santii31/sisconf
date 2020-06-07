<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
    use Models\UserxBank as UserxBank;
    use Models\User as User;
    use Models\Bank as Bank;	
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class UserxBankDAO {

		private $connection;
		private $userxbankList = array();
		private $tableName = "userxbank";		

		public function __construct() { }

		
        public function add(UserxBank $userxbank) {								
			try {					
				$query = "CALL userxbank_add(?, ?)";
				$parameters["FK_id_user"] = $userxbank->getIdUser();
				$parameters["FK_id_bank"] = $userxbank->getIdBank();
				$this->connection = Connection::getInstance();
				$this->connection->executeNonQuery($query, $parameters, QueryType::StoredProcedure);
				return true;
			}						
			catch (Exception $e) {
				return false;
				// echo $e;
			}	
		}
		
		public function getByUserId($id) {
			try {	
                $bankList = array();							              
                $query = "CALL userxbank_getBankByUser(?)";                
                $parameters["id"] = $id;                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$bank = new Bank();
					$bank->setId($row["bank_id"]);
					$bank->setName($row["bank_name"]);
                    $bank->setHomeBankingLink($row["bank_homeBankingLink"]);	        
                    array_push($bankList, $bank);            
				}
				return $bankList;

			} catch (Exception $e) {
				return false;
			}
		}

		

		public function getByBankId($id) {
			try {				
				$userList = array();                
                $query = "CALL userxbank_get(?)";                
                $parameters["id"] = $id;                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$user = new User();
					$user->setId($row["user_id"]);
					$user->setName($row["user_name"]);
					$user->setLastName($row["user_lastname"]);
					$user->setUserName($row["user_userName"]);
					$user->setPassword($row["user_password"]);					
                    array_push($userList, $user);
				}
				return $userList;

			} catch (Exception $e) {
				return false;
			}
		}
		

    }
					
		

 ?>
