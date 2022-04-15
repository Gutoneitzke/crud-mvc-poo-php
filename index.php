<?php

    // $nameController = $_GET['c'];
    // include_once ('./controllers/'.$nameController.'Controller.php');
    require_once ('./controllers/clientsController.php');

    $messages = [
        'edit' => ['editado','editar'],
        'delete' => ['deletado','deletar'],
        'update' => ['atualizado','atualizar'],
        'insert' => ['inserido','inserir']
    ];

    $controller = new ClientsController();

    $action = (isset($_GET['a']) || isset($_POST['a'])) ? (isset($_POST['a']) ? $_POST['a'] : $_GET['a']) : 'getAll';
    $message = isset($_GET['m']) ? $_GET['m'] : '';
    $status = isset($_GET['s']) ? $_GET['s'] : '';

    if(!empty($message) && !empty($status))
    {
        $controller->{$action}($messages[$message][0],$messages[$message][1],$status);
    }
    else if($action == "delete")
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
    else if($action == "edit")
    {
        $data = array('id'=>$_POST['id'],'name'=>$_POST['name'],'email'=>$_POST['email'],'phone'=>$_POST['phone']);
        $controller->{$action}($data);
    }
    else if($action == "new")
    {
        $data = array('name'=>$_POST['name'],'email'=>$_POST['email'],'phone'=>$_POST['phone']);
        $controller->{$action}($data);
    }
    else
    {
        $controller->{$action}();
    }