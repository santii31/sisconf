<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\Income as Income;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class IncomeDAO {

		private $connection;
		private $incomeList = array();
		private $tableName = "income";		

		public function __construct() { }

		
        public function add(Income $income) {								
			try {					
				$query = "CALL income_add(?, ?, ?, ?, ?, ?, @lastId)";
				$parameters["amount"] = $income->getAmount();
				$parameters["currency"] = $income->getCurrency();
				$parameters["date"] = $income->getDate();
				$parameters["reason"] = $income->getReason();
                $parameters["payment_method"] = $income->getPaymentMethod();
                $parameters["FK_id_user"] = $income->getIdUser();
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

		public function addBank($id, $id_bank) {								
			try {					
				$query = "CALL income_addBank(?, ?)";
				$parameters["id"] = $id;
				$parameters["id_bank"] = $id_bank;
                $this->connection = Connection::getInstance();
				$this->connection->executeNonQuery($query, $parameters, QueryType::StoredProcedure);
                
				return true;
			}
			catch (Exception $e) {
				//echo $e;
				return false;								
			}			
		}

		public function addCheck($id, $id_check) {								
			try {					
				$query = "CALL income_addCheck(?, ?)";
				$parameters["id"] = $id;
				$parameters["id_check"] = $id_check;
                $this->connection = Connection::getInstance();
				$this->connection->executeNonQuery($query, $parameters, QueryType::StoredProcedure);
                
				return true;
			}
			catch (Exception $e) {
				//echo $e;
				return false;								
			}			
		}
		
		public function getById(Income $income) {
			try {								              
                $query = "CALL income_getById(?)";                
                $parameters["id"] = $income->getId();                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$income = new Income();
					$income->setId($row["id"]);
					$income->setAmount($row["amount"]);
					$income->setCurrency($row["currency"]);
					$income->setDate($row["date"]);
                    $income->setReason($row["reason"]);
                    $income->setPaymentMethod($row["payment_method"]);
                    $income->setIdUser($row["FK_id_user"]);                    
				}
				return $income;

			} catch (Exception $e) {
				return false;
			}
		}
		
		public function getByUserId($id) {
			try {			
                $incomeListTemp = array();      
                $query = "CALL income_getByUserId(?)";                
                $parameters["id"] = $id;                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$incomeTemp = new Income();
					$incomeTemp->setId($row["id"]);
					$incomeTemp->setAmount($row["amount"]);
					$incomeTemp->setCurrency($row["currency"]);
					$incomeTemp->setDate($row["date"]);
                    $incomeTemp->setReason($row["reason"]);
                    $incomeTemp->setPaymentMethod($row["payment_method"]);
                    $incomeTemp->setIdUser($row["FK_id_user"]);
                    array_push($incomeListTemp, $incomeTemp);
				}
				return $incomeListTemp;

			} catch (Exception $e) {
				//echo $e;
				return false;
			}
		}
		
		public function getAll() {
			try {
				$query = "CALL income_getAll()";
				$this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
				foreach ($results as $row) {
					$income = new Income();
                    $income->setId($row["id"]);
					$income->setAmount($row["amount"]);
					$income->setCurrency($row["currency"]);
					$income->setDate($row["date"]);
                    $income->setReason($row["reason"]);
                    $income->setPaymentMethod($row["payment_method"]);
                    $income->setIdUser($row["FK_id_user"]);
					array_push($this->incomeList, $income);
				}
				return $this->userList;	
			} catch (Exception $e) {
				return false;
			}
		}

    }
					
		

 ?>
