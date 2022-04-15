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

        public function search($data){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data' or name LIKE '%$data%' or email LIKE '%$data%' or phone LIKE '%$data%'");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        public function new($data){
            $sqlUpdate = "INSERT INTO $this->table (name,email,phone) VALUES (:name, :email, :phone)";
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone']]);
            if($resultQuery == 1)
            {
                return true;
            }
            return false;
        }

        public function edit($data){
            $sqlUpdate = "UPDATE $this->table SET name = :name, email = :email, phone = :phone WHERE id = :id";
            $resultQuery = $this->connection->prepare($sqlUpdate)->execute(['id'=>$data['id'],'name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone']]);
            if($resultQuery == 1)
            {
                return true;
            }
            return false;
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
