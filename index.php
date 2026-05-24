<?php
    require_once("Config/App.php");
    include("Controllers/ViewController.php");
    $view = new ViewController();
     
    $view -> show_template_controller();