<?php
    require_once("Config/App.php");
    include("Controllers/ViewController.php");
    $view = new ViewController();
    echo $view -> show_template_controller();