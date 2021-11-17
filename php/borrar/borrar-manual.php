<?php
    include("../conexion.php");

    $resultado_borrar = [
        'error' => false,
        'mensaje' => 'Manual eliminado exitosamente'
    ];

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "El id no corresponde a ningun manual";
    }

    $query = 'DELETE FROM manuales WHERE cod_manual =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        header('LOCATION: ../../html/admin.php');
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
?>