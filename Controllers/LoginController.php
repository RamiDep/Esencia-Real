<?php
    if($action){
        require_once "../Models/LoginModel.php";
    }else{
        require_once "./Models/LoginModel.php";
    }

    class LoginController extends LoginModel{

        /**
         * Controlador para iniciar session
         */
        public function session_start_controller(){
            $user_name = MainModel :: clean_string($_POST['user_email']);
            $password = MainModel :: clean_string($_POST['user_password']);

            if(empty($user_name) || empty($password)){
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error inesperado",
                        text: "No has llenado todos los campos requeridos",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }

            if(MainModel :: check_data_form("[a-zA-Z0-9]{1,35}",$user_name)){
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error inesperado",
                        text: "El formato del campo USUARIO no es correcto",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }

            if(MainModel :: check_data_form("[a-zA-Z0-9$@.\-]{7,100}",$password)){
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error inesperado",
                        text: "El formato del campo CONTRASEÑA no es correcto",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }
             
            $password = MainModel :: encryption($password);

            $data_user_login = [
                "user_name" => $user_name,
                "password" => $password
            ];

            $init_session = LoginModel :: session_start_model($data_user_login);

            if($init_session -> rowCount() == 1){
                $data_user = $init_session->fetch();
                
            }else{
                echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error inesperado",
                        text: "Alguno de los campos no es correcto",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';    
            }

        }
    }