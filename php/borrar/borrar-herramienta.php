<?php
    include("../conexion.php");

    $resultado_borrar = [
        'error' => false,
        'mensaje' => 'Herramienta eliminado exitosamente'
    ];

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "El id no corresponde a ninguna herramienta";
        echo $resultado_borrar['mensaje'];
    }

    $query = 'SELECT * FROM herramientas WHERE cod_herramienta =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $herramientas = $consulta -> fetchAll();
    } catch(PDOException $e) {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "Foto asociada no encontrada";
        echo $resultado_borrar['mensaje'];
    }

    unlink("C:/xampp/htdocs/retoFixPoint/herramientas/".$herramientas[0]['foto']);

    $query = 'DELETE FROM herramientas WHERE cod_herramienta =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
    } catch(PDOException $e) {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "No se pudo borrar la foto";
        echo $resultado_borrar['mensaje'];
    }

    header('LOCATION: ../../html/admin.php');
?>