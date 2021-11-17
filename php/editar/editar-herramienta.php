<?php
    if ( isset($_REQUEST['submit']) ) {

        include('../conexion.php');
        
        $herramienta = [
            "id" => $_REQUEST['id'],
            "nombre" => $_REQUEST['nombre'],
            "marca_modelo" => $_REQUEST['apellido'],
            "foto" => $_REQUEST['foto']
        ];
        
        $resultado_update = [
            "error" => false,
            "mensaje" => "Herramienta " . $herramienta['nombre'] . " editada con exito"
        ];

        $update_usuario = "UPDATE herramientas SET nombre=:nombre, marca_y_modelo=:marca_modelo, foto=:foto WHERE cod_herramienta=:id";

        try {
            $sentencia = $conexion -> prepare($update_herramienta);
            $sentencia -> execute($herramienta);
        } catch (PDOException $e) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
        }
        
        header("LOCATION: http://localhost/retofixpoint/html/admin.php");
        
    }
?>