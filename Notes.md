# ENSENCIA_REAL

## Estructura del proyecto.
- Controllers: Controladores que se van a utilizar
- Models: Modelos que se usaran
- Views
    - Partials: Incluye todos los componentes de la plantilla, como lo son el menu, footer, herader etc.
    - Resuorces: Recursos que ya vienen incluidos en la plantilla admind 4
- Index.php
- .htaccees


*Acomodar la plantilla:*
Tomamos el index de la plantilla y lo vamos a pegar en en nuestro archivo template.php; Poco a poco lo vamos ir descomponiendo en partes, como el footer, header etc.

Como dijismos lo vamos a descomponer en partes, y estos componentes como el footer tendran su archivo propio.

*Controlador para mostrar la vista*
En la carpeta controllers en el controlador para vistas vamos a creaun un controlador para mostar la vista, este solo va a retornar el archivo template.

## Config
Se creo un carpeta llamada config, la cual va tener la URL DEL SERVIDOR Y EL NOMBRE DEL PROYECTO.
Tambien va tener la conexion a la base de datos

## Creando modelo-controlador main
    - MainModel.php

Creamos el modelo principal. archivo mainModel.php
Creamos la funcion para conectar a la base de datos
Creamos Funcion para ejecutar consultas select

Creamos dos funciones mas:
    - una para encriptar informacion. Informacion que se pase atraves de la url
    - Una para desempcriptar informacion.

Creamos funcion para validar datos:

    - Validar que no sea iuna inyecion sql.
    - validar que sea una fecha correcta
    - validar que sea una expresion regular (pattern - form)

# Creando archivo alerts.js que estara dentro de la carpeta view

Este archivo contendra todas las alertas para los formularios.

Crearemos una funcion en la que nos muestre las alertas con sweet alert


# === Creando modelo y Controlador de usuario: === # *¡Importante!*

Que va contener
    existe una variable llamada $action que se encuentra en plantilla

  *modelo: los modelos solo se ejecutan en un lugar, el controlador se puede ejecutar en varias rutas, sea en actions o en el index*
    Creamos la clase y la extendemos de MainModel e incluimos Mainmodel
  - Modelo para insertar datos
  - Modelo para editar datos 

  *Controlador: cuando estemos haciendo una peticion ajax el controlador se va ejecutar en actions. Cuand no sea una peticion se va ejecutar en el index*
  - Controlador para insertar datos
  - Controlador para editar datos 

  *Actions: debe incluir App. por que esta la ruta del servidor y habra una validacion en la que si no existe una peticion valida lo redirija al index*
  if:
    - instancia al controlador
  else:
    - inicializamos action en true
    - session_unset
    - session_destroy
    - heafer
    -exit

# === SIGUE TERMINAR LA VISTA DE CREAR USUARIOS === #

- PONER LOS NOMBRES DE LOS IMPUTS CORRECTAMENTE
- CAMPOS CON NOMBRES PARA VISTA DE USUARIO CORRECTAMENTE

# === CORRIGIENDO EL ERROR DEL SWEET ALERT === #


