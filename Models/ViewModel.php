<?php
class ViewModel
{

    protected static function get_view_model($view){
        $listWithe = 
        [
            "home"
        ];
        if (in_array($view, $listWithe))
        {
            if (is_file ("./Views/templates/".$view."-view.php")){
                $contend = "./Views/templates/".$view."-view.php";
            }  
            else{ $contend = "404";}     
        }elseif($view == "index" || $view == "login")
        {
            $contend = "login";
        }else{
                $contend = "404";
        }
            
        return $contend;    
    }
} 