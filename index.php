<?php

    // $nameController = $_GET['c'];
    // include_once ('./controllers/'.$nameController.'Controller.php');
    require_once ('./controllers/clientsController.php');

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
        $view = isset($_GET['v']) ? $_GET['v'] : 'index';
        if(empty($data))
        {
            $controller->getAll();
        }
        else
        {
            $controller->{$action}($data,$view);
        }
    }
    else
    {
        $controller->{$action}();
    }