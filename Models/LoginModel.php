<?php
    require_once("mainModel.php");

    class LoginModel extends MainModel{
        /**
        * Modelo para uso de Login
        */

        protected static function session_start_model($data){
            $sql = MainModel::connect_BD()->prepare("
                SELECT * FROM users WHERE 
                    user_name = :user_name 
                    AND password = :user_password
                    AND status = '1'
            ");

            $sql->bindParam(":user_name", $data["user"],);
            $sql->bindParam(":user_password", $data["password"],);
            $sql->execute();

            return $sql;
        }
    }