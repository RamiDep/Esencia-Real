<?php
    $action = true;
    require_once ("../Config/App.php");

    if(isset($_POST['add_user'])){
        require_once("../Controllers/UserController.php");
        $obj_user = new UserController();
        
    }else{
        session_start(['name' => 'esencia_real']);
        session_unset();
        session_destroy();
        header('Location: ' . SERVER_URL . 'login/');
        exit();
    } 

   