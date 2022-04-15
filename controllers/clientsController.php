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

        public function search($data){
            $resultData = $this->model->search($data);
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
    else if($action == "search")
    {
        $data = $_GET['search'];
        if(!$data)
        {
            $controller->getAll();
        }
        else
        {
            $controller->{$action}($data);
        }
    }
    else
    {
        $controller->{$action}();
    }
    

?>
