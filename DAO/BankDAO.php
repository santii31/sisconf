<?php

    namespace DAO;

	use \Exception as Exception;
	use \PDOException as PDOException;
	use Models\Bank as Bank;		
	use DAO\QueryType as QueryType;
	use DAO\Connection as Connection;	

    class BankDAO {

		private $connection;
		private $bankList = array();
		private $tableName = "bank";		

		public function __construct() { }

        
        public function getAll() {
			try {
				$query = "CALL bank_getAll()";
				$this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, array(), QueryType::StoredProcedure);
				foreach ($results as $row) {
					$bank = new Bank();
					$bank->setId($row["id"]);
					$bank->setName($row["name"]);
					$bank->setHomeBankingLink($row["homeBankingLink"]);
					array_push($this->bankList, $bank);
				}
				return $this->bankList;	
			} catch (Exception $e) {
				//echo $e;
				return false;
			}
		}
		
		public function getById(Bank $bank) {
			try {								              
                $query = "CALL bank_getById(?)";                
                $parameters["id"] = $bank->getId();                
                $this->connection = Connection::GetInstance();
				$results = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);											
				foreach ($results as $row) {
					$bank = new Bank();
					$bank->setId($row["id"]);
					$bank->setName($row["name"]);
					$bank->setHomeBankingLink($row["homeBankingLink"]);
				}
				return $bank;

			} catch (Exception $e) {
				return false;
			}
		}

        

    }
					
		

 ?>
