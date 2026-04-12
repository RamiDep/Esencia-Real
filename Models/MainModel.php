<?php
    
    if ($ajax_request){
        require_once ("../config/ServerDB.php");
    }else{
        require_once ("./config/ServerDB.php");
    }

    class MainModel{
        /* FUNCION PARA CONECTAR A LA BASE DE DATOS */
        protected static function connect_BD(){
            $conexion = new PDO(SGBD, USER, PASS);
            $conn->exec("SET NAMES utf8");
            return $conn;
        }

        /* FUNCION PARA EJECUTAR CONSULTAS SIMPLE */
        protected static function execute_consult($consult_sql){
            $response = self :: connect_BD -> prepare($consult_sql);
            $response -> execute();
            return $response;
        }

        /* FUNCION PARA ENCRIPTAR INFORMACION */
        public function encryption($string) {
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
            return base64_encode($output);
        }
        
        /* FUNCION PARA DESENCRIPTAR INFORMACION */
        public function decryption($string) {
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
            return $output;
        }

        /* FUNCION PARA EVITAR INYECIONES SQL */
        protected static function clean_string($string){
            $string = trim($string); //Elimina espacios antes de la cadena y al final
            $string = stripcslashes($string); // Elimina diagonales invertidas
            $string = str_ireplace("<script>", "", $string);
            $string = str_ireplace("</script>", "", $string);
            $string = str_ireplace("<script src", "", $string);
            $string = str_ireplace("<script type=", "", $string);
            $string = str_ireplace("SELECT * FROM", "", $string);
            $string = str_ireplace("DELETE FROM", "", $string);
            $string = str_ireplace("INSERT INTO", "", $string);
            $string = str_ireplace("DROP TABLE", "", $string);
            $string = str_ireplace("DROP DATABASE", "", $string);
            $string = str_ireplace("TRUNCATE TABLE", "", $string);
            $string = str_ireplace("SHOW TABLES", "", $string);
            $string = str_ireplace("SHOW DATABASES", "", $string);
            $string = str_ireplace("<?php", "", $string);
            $string = str_ireplace("?>", "", $string);
            $string = str_ireplace("--", "", $string);
            $string = str_ireplace(">", "", $string);
            $string = str_ireplace("<", "", $string);
            $string = str_ireplace("[", "", $string);
            $string = str_ireplace("]", "", $string);
            $string = str_ireplace("==", "", $string);
            $string = str_ireplace("^", "", $string);
            $string = str_ireplace(";", "", $string);
            $string = str_ireplace("::", "", $string);
            $string = stripcslashes($string); // Elimina diagonales invertidas
            $string = trim($string); //Elimina espacios antes de la cadena y al final
            return $string;
        }

         /*Valida una expresion regular (pattern) en formularios */
        protected static function check_data_form($filter, $string){
            if(preg_match("/^". $filter ."$/", $string)){
                return false;
            }else{
                return true;
            }
        }

        /*Valida una fecha */
        protected static function check_date($date){
            $split = explode("-", $date);
            if(count($split) == 3 && check_date($split[1], $split[2], $split[0])){
                return false;
            }else{
                return true;
            }
        }



    }
