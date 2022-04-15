<?php

    require_once "./configuration/connect.php";

    class ClientModel extends Connect{
        
        private $table;

        function __construct(){
            parent::__construct();
            $this->table = "clients";
        }

        public function getAll(){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function search($id){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = $id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function delete($id){ 
            if(!$this->search($id))
            {
                return false;
            }
            $sqlDelete = "DELETE FROM $this->table WHERE id = :id";
            $resultQuery = $this->connection->prepare($sqlDelete)->execute(['id'=>$id]);
            if($resultQuery == 1)
            {
                return true;
            }
            return false;
        }
    }

?>
