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
    }

    $query = 'DELETE FROM herramientas WHERE cod_herramienta =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        header('LOCATION: ../../html/admin.php');
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
?>