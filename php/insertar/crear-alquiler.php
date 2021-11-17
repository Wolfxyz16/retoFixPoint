<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');

        $fecha_devolver = date_create( NULL );
        date_add($fecha_devolver,date_interval_create_from_date_string("7 days"));
        
        $alquiler = [
            "cod_user" => $_REQUEST['usuario'],
            "cod_herramienta" => $_REQUEST['herramienta'],
            "fecha_prealquiler" => NULL,
            "fecha_actual" => $_REQUEST['fecha_actual'],
            "fecha_devolver" => date_format($fecha_devolver,"Y-d-m")
        ];

        $insert_alquiler = "INSERT INTO alquileres (cod_user,cod_herramienta,fecha_prealquiler,fecha_alquiler_inicio,fecha_alquiler_fin) VALUES (:cod_user,:cod_herramienta,:fecha_prealquiler,:fecha_actual,:fecha_devolver)";

        try {
            $sentencia = $conexion -> prepare($insert_alquiler);
            $sentencia -> execute($alquiler);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        header("LOCATION: ../../html/admin.php");

    }

?>