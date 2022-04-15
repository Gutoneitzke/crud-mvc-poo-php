<?php

    require_once "./models/Client.php";

    class ClientsController{

        private $model;

        function __construct(){
            $this->model = new ClientModel();
        }

        public function getAll(){
            $resultData = $this->model->getAll();
            require_once "./views/index.php";
        }

        public function search($data,$view){
            $resultData = $this->model->search($data);
            require_once "./views/$view.php";
        }

        public function delete($id){
            $result = $this->model->delete($id);
            if(!$result)
            {
                echo "Erro ao deletar! Registro inexistente";
            }
            else
            {
                echo "Registro deletado com sucesso!";
            }
            $this->getAll();
        }
    }

?>
