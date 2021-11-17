<?php
    if ( isset($_REQUEST['submit']) ) {

        include('../conexion.php');
        
        $usuario = [
            "id" => $_REQUEST['id'],
            "nombre" => $_REQUEST['nombre'],
            "apellido" => $_REQUEST['apellido'],
            "mail" => $_REQUEST['mail']
        ];
        
        $resultado_update = [
            "error" => false,
            "mensaje" => "Usuario " . $usuario['nombre'] . " editado con exito"
        ];

        $update_usuario = "UPDATE usuarios SET name=:nombre, surname=:apellido, mail=:mail WHERE cod_user=:id";

        try {
            $sentencia = $conexion -> prepare($update_usuario);
            $sentencia -> execute($usuario);
        } catch (PDOException $e) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
        }
        
        header("LOCATION: ../../html/admin.php?resultado=$resultado_update");

    }
?>