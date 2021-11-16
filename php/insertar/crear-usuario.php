<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');
        
        $usuario = [
            "nombre" => $_REQUEST['nombre'],
            "apellido" => $_REQUEST['apellido'],
            "email" => $_REQUEST['email'],
            "password" => $_REQUEST['password']
        ];

        $insert_usuario = "INSERT INTO usuarios (name,surname,mail,password) VALUES (:nombre, :apellido, :mail, :password)";

        $sentencia = $conexion -> prepare($insert_usuario);
        $sentencia = execute($usuario);

    }
?>