<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');
        
        $manual = [
            "titulo" => $_REQUEST['titulo'],
            "fichero" => $_REQUEST['fichero'],
            "portada" => $_REQUEST['portada'],
            "cod_autor" => 1,
            "aprobado" => 1
        ];

        $insert_manual = "INSERT INTO manuales (titulo,fichero,portada,cod_autor,aprobado) VALUES (:titulo,:fichero,:portada,:cod_autor,:aprobado)";

        try {
            $sentencia = $conexion -> prepare($insert_manual);
            $sentencia -> execute($manual);
            header("LOCATION: http://localhost:8010/retofixpoint/html/admin.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

?>