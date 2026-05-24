<?php
    if($action)
        require_once("../Models/PerfumModel.php");
    else
        require_once("./Models/PerfumModel.php");

    class PerfumController extends PerfumModel{
        
    }