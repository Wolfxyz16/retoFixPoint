<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');
        
        $usuario = [
            "nombre" => $_REQUEST['nombre'],
            "apellido" => $_REQUEST['apellido'],
            "mail" => $_REQUEST['mail'],
            "password" => $_REQUEST['password']
        ];

        $insert_usuario = "INSERT INTO usuarios (`name`, `surname`, `mail`, `password`) VALUES (:nombre, :apellido, :mail, :password);";

        try {
            $sentencia = $conexion -> prepare($insert_usuario);
            $sentencia -> execute($usuario);
            header("LOCATION: ../../html/admin.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
?>