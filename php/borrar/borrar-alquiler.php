<?php
    include("../conexion.php");

    $resultado_borrar = [
        'error' => false,
        'mensaje' => 'Alquiler eliminado exitosamente'
    ];

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "El id no corresponde a ningun alquiler";
    }

    $query = 'DELETE FROM alquileres WHERE cod_alquiler =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
    
    header('LOCATION: ../../html/admin.php');
?>