<!doctype html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esencia real</title>
    <link rel="stylesheet" href="./Views/partials/login/style-login.css">


</head>
<body>
    <div class="container">
        <div class="container-form">
            <form class="sign-in" method="POST">
                <h2>Iniciar de sessión</h2>
                <div class="social-networks">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                </div>

                <span>Use su correo y contraseña</span>

                <div class="container-input">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" placeholder="Usuario" name="user_email" >
                </div>

                <div class="container-input">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" placeholder="Contraseña" name="user_password">
                </div>
                <!-- <a href="">¿Olvidaste tu contraseña?</a> -->
                <button class="button">Iniciar sessión</button>
            </form>
        </div>
        <div class="container-form">
            <form class="sign-up">
                <h2>Registrarse</h2>
                <div class="social-networks">
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-whatsapp"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <ion-icon name="logo-instagram"></ion-icon>
                </div>

                <span>Use su correo para registarse</span>
                <div class="container-input">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" placeholder="Nombre">
                </div>

                <div class="container-input">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" placeholder="Email">
                </div>
                <div class="container-input">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" placeholder="Password">
                </div>
                <button class="button">Registrarse</button>
            </form>
        </div>
        <div class="container-welcome">
            <div class="welcome-sign-up welcome" >
                <h3>¡Bienvenido!</h3>
                <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
                <!-- <button class="button" id="btn-sign-up">Registrarse</button> -->
            </div>
            <div class="welcome-sign-in welcome" >
                <h3>¡Bienvenido!</h3>
                <p>Ingrese con sus datos personales para usar todas las funciones del sitio</p>
                <button class="button" id="btn-sign-in">Inciar sessión</button>
            </div>
        </div>

        <?php 
        if(isset($_POST['user_email']) && isset($_POST['user_password'])){
            require_once("./Controllers/LoginController.php");
            $start_session_obj = new LoginController();
            $start_session_obj -> session_start_controller();
        }       
        ?>

    </div>

    <!-- <button id="btn_change">Click</button> -->
  
    <script src="./Views/partials/login/script-login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>



</html>