<?php
    if($action)
        require_once("../Models/UserController.php");
    else
        require_once("./Models/UserController.php");

    class UserController extends UserModel{

    }