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

        public function search($data,$view=null){
            $resultData = $this->model->search($data,$view);
            require_once "./views/$view.php";
        }

        public function goToNew(){
            require_once "./views/editCreate.php";
        }

        public function new($data){
            $result = $this->model->new($data);
            $this->redirectWithMessage('insert',$result);
        }

        public function edit($data){
            $result = $this->model->edit($data);
            $this->redirectWithMessage('edit',$result);
        }

        public function delete($id){
            $result = $this->model->delete($id);
            $this->redirectWithMessage('delete',$result);
        }

        public function redirectWithMessage($type,$result){
            header("Location: index.php?m=$type&a=showMessage&s=$result");
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
