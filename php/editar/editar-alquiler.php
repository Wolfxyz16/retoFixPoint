<?php
    if ( isset($_REQUEST['submit']) ) {

        include('../conexion.php');
        
        $alquiler = [
            "id" => $_REQUEST['id'],
            "cod_user" => $_REQUEST['usuario'],
            "cod_herramienta" => $_REQUEST['herramienta'],
            "fecha_alquiler_fin" => $_REQUEST['fecha_alquiler_fin']
        ];
        
        $resultado_update = [
            "error" => false,
            "mensaje" => "Alquiler editado con exito"
        ];

        $update_alquiler = "UPDATE alquileres SET cod_user=:cod_user, cod_herramienta=:cod_herramienta, fecha_alquiler_fin=:fecha_alquiler_fin WHERE cod_alquiler=:id";

        try {
            $sentencia = $conexion -> prepare($update_alquiler);
            $sentencia -> execute($alquiler);
        } catch (PDOException $e) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
        }
        
        header("LOCATION: http://localhost/retofixpoint/html/admin.php?resultado=$resultado_update");

    }
?>