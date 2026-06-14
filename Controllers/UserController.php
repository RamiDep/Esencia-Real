<?php
    if($action)
        require_once("../Models/UserModel.php");
    else
        require_once("./Models/UserModel.php");

    class UserController extends UserModel{

        public function add_user_controller(){

            $user_name = MainModel :: clean_string($_POST['user_name']);
            $last_name_father = MainModel :: clean_string($_POST['last_name_father']);
            $last_name_mother = MainModel :: clean_string($_POST['last_name_mother']);
            $email = MainModel :: clean_string($_POST['user_email']);
            $phone = MainModel :: clean_string($_POST['user_number_phone']);
            $password = MainModel :: clean_string($_POST['user_password']);
            $password_repead = MainModel :: clean_string($_POST['user_password_repeat']);
            $type_user = MainModel :: clean_string($_POST['user_role']);

            if(!empty($user_name) || !empty($last_name_father) || !empty($last_name_mother) || !empty($email)
                || !empty($phone) || !empty($password) || !empty($password_repead) || !empty($type_user)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"No llenaste todos los campos (Obligatorios)",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(MainModel :: check_data_form("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $user_name)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"El campo nombre no contiene datos validos, por favor vuelva a intentarlo",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(MainModel :: check_data_form("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $last_name_father)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"El campo apellido paterno no contiene datos validos, por favor vuelva a intentarlo",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if(MainModel :: check_data_form("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $last_name_mother)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"El campo apellido materno no contiene datos validos, por favor vuelva a intentarlo",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (MainModel::checkData("[a-zA-Z0-9$@.\-]{7,100}", $password) || MainModel::checkData("[a-zA-Z0-9$@.\-]{7,100}", $password_repead)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"Formato incorrecto en el campo contraseña",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if($password != $password_repead){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"¡Las contraseñas no son iguales!",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }else{
                $password = md5($password);
            }

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $check_email = MainModel :: execute_consult("SELECT email FROM `users` WHERE email = '$email'");
                if ($check_email -> rowCount() > 0){
                    $alerta = [
                        "Alerta"=>"simple",
                        "Title"=>"Ocurrio un error inesperado",
                        "Text"=>"¡El correo ingresado ya existe en el sistema!",
                        "Type"=>"error"
                    ];
                    echo json_encode($alerta);
                    exit();  
                }  
            }else{
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"¡Debes poner un correo valido!",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            if (MainModel::checkData("[0-9\-]{1,10}", $phone)){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"Formato incorrecto en el campo telefono",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();
            }

            
            if($type_user < 1 || $type_user > 3){
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Ocurrio un error inesperado",
                    "Text"=>"¡El privilegio no es valido!",
                    "Type"=>"error"
                ];
                echo json_encode($alerta);
                exit();   
            }

            $data_user = [
                "user_name" => $user_name,
                "last_name_father" => $last_name_father,
                "last_name_mother" => $last_name_mother,
                "user_email" => $email,
                "user_number_phone" => $phone,
                "user_password" => $password,
                "user_role" => $type_user,
            ];

            $add_user_insert = UserModel :: add_user_model($data_user);

            if($add_user_insert->rowCount() == 1){
                $alerta = [
                    "Alerta"=>"limpiar",
                    "Title"=>"¡Exito!",
                    "Text"=>"Se ha registrado el usuario correctamente",
                    "Type"=>"success"
                ];
            }else{
                $alerta = [
                    "Alerta"=>"simple",
                    "Title"=>"Usuario  No registrado",
                    "Text"=>"Ocurrio un error al guardar los datos",
                    "Type"=>"error"
                ];
            }
            echo json_encode($alerta);
        }


    }