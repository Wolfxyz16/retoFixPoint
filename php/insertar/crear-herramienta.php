<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');
        
        $herramienta = [
            "nombre" => $_REQUEST['nombre'],
            "marca_modelo" => $_REQUEST['marca_modelo'],
            "foto" => $_REQUEST['foto'],
            "disponibilidad" => "Disponible"
        ];

        $insert_herramienta = "INSERT INTO herramientas (nombre,marca_y_modelo,foto,disponibilidad) VALUES (:nombre, :marca_modelo, :foto, :disponibilidad)";

        try {
            $sentencia = $conexion -> prepare($insert_herramienta);
            $sentencia -> execute($herramienta);
            header("LOCATION: http://localhost:8010/retofixpoint/html/admin.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

?>