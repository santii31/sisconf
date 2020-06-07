<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\User as User;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class UserDAO {

		private $connection;
		private $userList = array();
		private $tableName = "user";		

		public function __construct() { }

		
        public function add(User $user) {								
			try {					
				$query = "CALL user_add(?, ?, ?, ?, ?, @lastId)";
				$parameters["name"] = $user->getName();
				$parameters["lastname"] = $user->getLastName();
				$parameters["userName"] = $user->getUserName();
				$parameters["password"] = $user->getPassword();
				$parameters["date_register"] = date("Y-m-d");
				$this->connection = Connection::getInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);
                
                foreach ($results as $row) {
                    $lastId = $row['lastId'];                
				}
				return $lastId;
			}
			catch (Exception $e) {
				//echo $e;
				return false;								
			}			
		}
		
		public function getById(User $user) {
			try {								              
                $query = "CALL user_getById(?)";                
                $parameters["id"] = $user->getId();                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$user = new User();
					$user->setId($row["id"]);
					$user->setName($row["name"]);
					$user->setLastName($row["lastname"]);
					$user->setUserName($row["userName"]);
					$user->setPassword($row["password"]);
										                    
				}
				return $user;

			} catch (Exception $e) {
				return false;
			}
		}
		
		public function getByUserName(User $user) {
			try {				   
				$userTemp = null;      
                $query = "CALL user_getByUserName(?)";                
                $parameters["user_name"] = $user->getUserName();                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$userTemp = new User();
					$userTemp->setId($row["id"]);
					$userTemp->setName($row["name"]);
					$userTemp->setLastName($row["lastname"]);
					$userTemp->setUserName($row["userName"]);
					$userTemp->setPassword($row["password"]);
					$userTemp->setIsActive($row["is_active"]);
				}
				return $userTemp;

			} catch (Exception $e) {
				//echo $e;
				return false;
			}
		}
		
		public function getAll() {
			try {
				$query = "CALL user_getAll()";
				$this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
				foreach ($results as $row) {
					$user = new User();
					$user->setId($row["id"]);
					$user->setName($row["name"]);
					$user->setLastName($row["lastName"]);
					$user->setUserName($row["userName"]);
					$user->setPassword($row["password"]);
					array_push($this->userList, $user);
				}
				return $this->userList;	
			} catch (Exception $e) {
				return false;
			}
		}

    }
					
		

 ?>
