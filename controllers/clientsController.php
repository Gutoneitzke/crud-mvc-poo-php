<?php

    require_once "./models/Client.php";

    class ClientsController{

        private $model;

        function __construct(){
            $this->model = new ClientModel();
        }

        public function getAll(){
            $resultData = $this->model->getAll();
            // print_r($resultData);
            // die();
            require_once "./views/index.php";
        }

        public function search($id){
            $resultData = $this->model->search($id);
            // print_r($resultData);
            // die();
            require_once "./views/index.php";
        }

        public function delete($id){
            $result = $this->model->delete($id);
            // print_r($result);
            // die();
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

    $controller = new ClientsController();

    $action = isset($_GET['a']) ? $_GET['a'] : 'getAll';
    if($action == "delete")
    {
        $id = $_GET['id'];
        $controller->{$action}($id);
    }
    else
    {
        $controller->{$action}();
    }
    

?>
