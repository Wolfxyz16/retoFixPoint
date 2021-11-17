<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');

        $resultado = [
            'error' => false,
            'mensaje' => 'Manual agregado exitosamente'
        ];

        $portada_nombre = $_FILES['portada']['name'];
        $fichero_nombre = $_FILES['fichero']['name'];
        
        $manual = [
            "titulo" => $_REQUEST['titulo'],
            "fichero" => $fichero_nombre,
            "portada" => $portada_nombre,
            "cod_autor" => 1,
            "aprobado" => 1
        ];

        $portada_destino = "C:/xampp/htdocs/retoFixPoint/manuales/portadas/".basename($portada_nombre);
        $fichero_destino = "C:/xampp/htdocs/retoFixPoint/manuales/archivos/".basename($fichero_nombre);

        $insert_manual = "INSERT INTO manuales (titulo,fichero,portada,cod_autor,aprobado) VALUES (:titulo,:fichero,:portada,:cod_autor,:aprobado)";

        try {
            $sentencia = $conexion -> prepare($insert_manual);
            $sentencia -> execute($manual);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if ( move_uploaded_file($_FILES['portada']['tmp_name'] , $portada_destino) && move_uploaded_file($_FILES['fichero']['tmp_name'] , $fichero_destino) ) {

        } else {
            $resultado['error'] = true;
            $resultado['mensaje'] = 'Ha habido un error subiendo el manual';
        }
        
        header("LOCATION: http://localhost/retofixpoint/html/admin.php");

    }
?>