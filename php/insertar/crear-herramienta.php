<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');

        $resultado = [
            'error' => false,
            'mensaje' => 'Herramienta agregada exitosamente'
        ];
        
        $foto_nombre = $_FILES['foto']['name'];

        $herramienta = [
            "nombre" => $_REQUEST['nombre'],
            "marca_modelo" => $_REQUEST['marca_modelo'],
            "foto" => $foto_nombre,
            "disponibilidad" => "Disponible"
        ];
        
        $foto_destino = "C:/xampp/htdocs/retoFixPoint/herramientas/".basename($foto_nombre);
        // hay que poner la direccion completa
        // WARNING: Failed to open stream: No such file or directory 

        $insert_herramienta = "INSERT INTO herramientas (nombre,marca_y_modelo,foto,disponibilidad) VALUES (:nombre, :marca_modelo, :foto, :disponibilidad)";

        try {
            $sentencia = $conexion -> prepare($insert_herramienta);
            $sentencia -> execute($herramienta);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        if ( move_uploaded_file($_FILES['foto']['tmp_name'] , $foto_destino) ) {

        } else {
            $resultado['error'] = true;
            $resultado['mensaje'] = 'Ha habido un error subiendo la herramienta';
        }

        header("LOCATION: http://localhost:8010/retofixpoint/html/admin.php");
    }

?>