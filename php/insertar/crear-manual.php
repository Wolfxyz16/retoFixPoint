<?php
    if ( isset($_REQUEST['submit']) ) {
        include('../conexion.php');
        
        $manual = [
            "id" => "",
            "titulo" => $_REQUEST['titulo'],
            "fichero" => "",
            "portada" => "",
            "cod_autor" => 1,
            "aprobado" => 1
        ];

        $insert_manual = "INSERT INTO manuales (titulo,fichero,portada,cod_autor,aprobado) VALUES (:titulo,:fichero,:portada,:cod_autor,:aprobado)";

        try {
            $sentencia = $conexion -> prepare($insert_manual);
            $sentencia -> execute($manual);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $sentencia = $conexion -> prepare('SELECT LAST_INSERT_ID();');
            $sentencia -> execute();
            $manual['id'] = $sentencia -> fetchAll();
            echo '<script>console.log("LAST_INSERT_ID exitoso")</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $manual['portada'] = "/manuales/portada/".$manual['id'][0][0].".png";
        $manual['fichero'] = "/manuales/archivos/".$manual['id'][0][0].".pdf";

        try {
            $sql = 'UPDATE manuales SET fichero='.$manual['fichero'].',portada='.$manual['portada'].' WHERE id='.$manual['id'][0][0];
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
            echo '<script>console.log("update exitoso")</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        guardarFichero($manual);
        guardarPortada($manual);
        
        header("LOCATION: http://localhost/retofixpoint/html/admin.php");

    }

    function guardarFichero($manual) {
        $_FILES["fichero"]["name"] = $manual["id"];
        $direccion = "manuales/archivos/";
        $fichero = $direccion . basename($_FILES["fichero"]["name"]);
        $imageFileType = strtolower(pathinfo($fichero,PATHINFO_EXTENSION));
        $exito = true;

        if ( file_exists($fichero) ) {
            echo "Ya existe el archivo manual";
            $exito = false;
        }

        if( $imageFileType != "pdf" ) {
            echo "El archivo no es pdf";
            $uploadOk = false;
        }

        if ($uploadOk == false) {
            echo "No se pudo subir el archivo.";
          } else {
            if (move_uploaded_file($_FILES["manual"]["tmp_name"], $fichero)) {
              echo "El archivo ". htmlspecialchars( basename( $_FILES["manual"]["name"])). " se ha subido correctamente";
            } else {
              echo "Ha habido un error con el archivo";
            }
          }
    }

    function guardarPortada($manual) {
        $fichero = $manual['portada'];
        $imageFileType = strtolower(pathinfo($fichero,PATHINFO_EXTENSION));
        $exito = true;

        if ( file_exists($fichero) ) {
            echo "Ya existe el archivo portada";
            $exito = false;
        }

        if( $imageFileType != "png" ) {
            echo "El archivo no es png";
            $exito = false;
        }

        if ($exito == false) {
            echo "No se pudo subir el archivo.";
          } else {
            if (move_uploaded_file($_FILES["portada"]["tmp_name"], $fichero)) {
              echo "El archivo ". htmlspecialchars( basename( $_FILES["portada"]["name"])). " se ha subido correctamente";
            } else {
              echo "Ha habido un error con el archivo";
            }
          }
    }

?>