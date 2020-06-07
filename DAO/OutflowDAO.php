<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\Outflow as Outflow;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class OutflowDAO {

		private $connection;
		private $outflowList = array();
		private $tableName = "outflow";		

		public function __construct() { }

		
        public function add(Outflow $outflow) {								
			try {					
				$query = "CALL outflow_add(?, ?, ?, ?, ?, ?, @lastId)";
				$parameters["amount"] = $outflow->getAmount();
				$parameters["currency"] = $outflow->getCurrency();
				$parameters["date"] = $outflow->getDate();
				$parameters["reason"] = $outflow->getReason();
                $parameters["payment_method"] = $outflow->getPaymentMethod();
                $parameters["FK_id_user"] = $outflow->getIdUser();
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
				$query = "CALL outflow_addBank(?, ?)";
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
				$query = "CALL outflow_addCheck(?, ?)";
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

		public function getById(Outflow $outflow) {
			try {								              
                $query = "CALL outflow_getById(?)";                
                $parameters["id"] = $outflow->getId();                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$outflow = new Outflow();
					$outflow->setId($row["id"]);
					$outflow->setAmount($row["amount"]);
					$outflow->setCurrency($row["currency"]);
					$outflow->setDate($row["date"]);
                    $outflow->setReason($row["reason"]);
                    $outflow->setPaymentMethod($row["payment_method"]);
                    $outflow->setIdUser($row["FK_id_user"]);                    
				}
				return $outflow;

			} catch (Exception $e) {
				return false;
			}
		}
		
		public function getByUserId($id) {
			try {			
                $outflowListTemp = array();      
                $query = "CALL outflow_getByUserId(?)";                
                $parameters["id"] = $id;                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$outflowTemp = new Outflow();
					$outflowTemp->setId($row["id"]);
					$outflowTemp->setAmount($row["amount"]);
					$outflowTemp->setCurrency($row["currency"]);
					$outflowTemp->setDate($row["date"]);
                    $outflowTemp->setReason($row["reason"]);
                    $outflowTemp->setPaymentMethod($row["payment_method"]);
                    $outflowTemp->setIdUser($row["FK_id_user"]);
                    array_push($outflowListTemp, $outflowTemp);
				}
				return $outflowListTemp;

			} catch (Exception $e) {
				//echo $e;
				return false;
			}
		}
		
		public function getAll() {
			try {
				$query = "CALL outflow_getAll()";
				$this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
				foreach ($results as $row) {
					$outflow = new Outflow();
                    $outflow->setId($row["id"]);
					$outflow->setAmount($row["amount"]);
					$outflow->setCurrency($row["currency"]);
					$outflow->setDate($row["date"]);
                    $outflow->setReason($row["reason"]);
                    $outflow->setPaymentMethod($row["payment_method"]);
                    $outflow->setIdUser($row["FK_id_user"]);
					array_push($this->outflowList, $outflow);
				}
				return $this->outflowList;	
			} catch (Exception $e) {
				return false;
			}
		}

    }
					
		

 ?>
