<?php
    $action = true;
    require_once("../Config/App.php");

   
    if(isset($_POST['user']) && isset($_POST['token'])){     
        require_once "../Controllers/LoginController.php";
        $log_out = new LoginController();
        $log_out -> close_session();
    }else{
        session_start(["name" => 'Error']);
        session_unset();
        session_destroy();
        header('Location: '.serverUrl."login/");
        exit();
    }