<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\Check as Check;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class CheckDAO {

		private $connection;
		private $checkList = array();
		private $tableName = "check";		

		public function __construct() { }

		
        public function add(Check $check) {								
			try {					
				$query = "CALL check_add(?, ?, ?, ?, ?, ?, ?, @lastId)";
                $parameters["date_of_issue"] = $check->getDateOfIssue();
                $parameters["expiration_date"] = $check->getExpirationDate();
                $parameters["currency"] = $check->getCurrency();
                $parameters["amount"] = $check->getAmount();
				$parameters["contributor"] = $check->getContributor();
                $parameters["FK_id_user"] = $check->getIdUser();
                $parameters["FK_id_bank"] = $check->getIdBank();
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
		
		
		public function getByUserId($id) {
			try {			
                $checkListTemp = array();      
                $query = "CALL check_getByUserId(?)";                
                $parameters["id"] = $id;                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$checkTemp = new Check();
                    $checkTemp->setId($row["id"]);
                    $checkTemp->setDateOfIssue($row["date_of_issue"]);
                    $checkTemp->setExpirationDate($row["expiration_date"]);
                    $checkTemp->setCurrency($row["currency"]);
					$checkTemp->setAmount($row["amount"]);
                    $checkTemp->setContributor($row["contributor"]);
                    $checkTemp->setIdUser($row["FK_id_user"]);
                    $checkTemp->setIdBank($row["FK_id_bank"]);
                    array_push($checkListTemp, $checkTemp);
				}
				return $checkListTemp;

			} catch (Exception $e) {
				//echo $e;
				return false;
			}
		}
		

    }
		