<?php
    if ( isset($_REQUEST['submit']) ) {

        include('../conexion.php');
        
        $manual = [
            "id" => $_REQUEST['id'],
            "titulo" => $_REQUEST['titulo'],
            "portada" => $_REQUEST['portada'],
            "fichero" => $_REQUEST['fichero']
        ];
        
        $resultado_update = [
            "error" => false,
            "mensaje" => "Manual " . $manual['titulo'] . " editado con exito"
        ];

        $update_manual = "UPDATE manuales SET titulo=:titulo, portada=:portada, fichero=:fichero WHERE cod_manual=:id";

        try {
            $sentencia = $conexion -> prepare($update_manual);
            $sentencia -> execute($manual);
        } catch (PDOException $e) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
        }
        
        header("LOCATION: ../../html/admin.php");
        
    }
?>