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

        public function edit($data){
            $result = $this->model->edit($data);
            $this->showMessage('editado','editar',$result);
            $this->getAll();
        }

        public function delete($id){
            $result = $this->model->delete($id);
            $this->showMessage('deletado','deletar',$result);
            $this->getAll();
        }

        public function showMessage($success,$error,$status){
            if(!$status)
            {
                echo "Erro ao $error!";
            }
            else
            {
                echo "Registro $success com sucesso!";
            }
        }
    }

?>
