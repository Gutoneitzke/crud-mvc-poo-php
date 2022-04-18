<?php

    require_once "./models/Client.php";

    class ClientsController{

        private $model;

        function __construct(){
            $this->model = new ClientModel();
        }

        public function getAll($data=null){
            $resultData = $this->model->getAll();
            $returnMessage = $data;
            require_once "./views/index.php";
        }

        public function search($data,$view){
            $resultData = $this->model->search($data,$view);
            require_once "./views/$view.php";
        }

        public function goToNew(){
            require_once "./views/editCreate.php";
        }

        public function new($data){
            $result = $this->model->new($data);
            header("Location: index.php?m=insert&a=showMessage&s=$result");
        }

        public function edit($data){
            $result = $this->model->edit($data);
            header("Location: index.php?m=edit&a=showMessage&s=$result");
        }

        public function delete($id){
            $result = $this->model->delete($id);
            header("Location: index.php?m=delete&a=showMessage&s=$result");
        }

        public function showMessage($success,$error,$status){
            if($status == 1)
            {
                $returnMessage = "Registro $success com sucesso!";
            }
            else
            {
                $returnMessage = "Erro ao $error!";
            }
            $this->getAll($returnMessage);
        }
    }

?>
