<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\Buy_credit as Buy_credit;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class BuyCreditDAO {

		private $connection;
		private $buyCreditList = array();
		private $tableName = "buy_credit";		

		public function __construct() { }

		
        public function add(Buy_credit $buy_credit) {								
			try {					
				$query = "CALL buy_credit_add(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $parameters["currency"] = $buy_credit->getCurrency();
                $parameters["amount"] = $buy_credit->getAmount();
                $parameters["fees"] = $buy_credit->getFees();
                $parameters["remaining_fees"] = $buy_credit->getRemainingFees();
                $parameters["monthly_fee"] = $buy_credit->getMonthlyFee();
                $parameters["date"] = $buy_credit->getDate();
				$parameters["reason"] = $buy_credit->getReason();
                $parameters["FK_id_bank"] = $buy_credit->getIdBank();
                $parameters["FK_id_user"] = $buy_credit->getIdUser();
                
                $this->connection = Connection::getInstance();
				$this->connection->executeNonQuery($query, $parameters, QueryType::StoredProcedure);
                
				return true;
			}
			catch (Exception $e) {
				//echo $e;
				return false;								
			}			
		}
		
		
		/*public function getByUserId($id) {
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
		}*/
		

    }
		