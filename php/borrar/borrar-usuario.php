<?php
    include("../conexion.php");

    $resultado_borrar = [
        'error' => false,
        'mensaje' => 'Usuario eliminado exitosamente'
    ];

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "El id no corresponde a ningun usuario";
    }

    $query = 'DELETE FROM usuarios WHERE cod_user =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        header('LOCATION: ../../html/admin.php');
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
?>