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
hasta aqui me quede

