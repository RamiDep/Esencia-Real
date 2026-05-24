<?php
   
    require_once("MainModel.php");    

    class UserModel extends MainModel{
        protected static function add_user_model($data){
        
            $sql = MainModel::connect_BD()->prepare("
                INSERT INTO users
                (user_name, last_name_fat, last_name_mot, email, password, number_phone, rol_user) 
                VALUES
                (:name_user, :last_name_fat, :last_name_mot, :email, :password, :phone, :rol_user)
            ");

            $sql->bindParam(":DNI", $data["user_name"]);
            $sql->bindParam(":Nombre", $data["last_name_father"],);
            $sql->bindParam(":Apellido", $data["last_name_mother"],);
            $sql->bindParam(":Telefono", $data["user_email"],);
            $sql->bindParam(":Direccion", $data["user_number_phone"],);
            $sql->bindParam(":Email", $data["user_password"],);
            $sql->bindParam(":Usuario", $data["user_role"],);
            
            $sql->execute();

            return $sql;

        }
    }