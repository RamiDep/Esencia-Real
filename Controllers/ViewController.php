<?php
    require_once("./Models/ViewModel.php");
    class ViewController extends ViewModel{
        
        public function show_template_controller()
        {
            return include("Views/template.php");
        }

        public function get_view_controller()
        {
            if(isset($_GET['views']))
            {
                $route = explode("/", $_GET['views']);
                $response = ViewModel :: get_view_model($route[0]);
            }else
            {
                $response = "login";
            }
        
            return $response;
        }
    }