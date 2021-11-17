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

    $query = 'SELECT * FROM manuales WHERE cod_manual =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $manuales = $consulta -> fetchAll();
    } catch(PDOException $e) {
        $resultado_borrar['error'] = true;
        $resultado_borrar['mensaje'] = "No se encontro fichero ni la portada asociada";
        echo $resultado_borrar['mensaje'];
    }

    unlink("C:/xampp/htdocs/retoFixPoint/manuales/archivos/".$manuales[0]['fichero']);
    unlink("C:/xampp/htdocs/retoFixPoint/manuales/portadas/".$manuales[0]['portada']);

    $query = 'DELETE FROM manuales WHERE cod_manual =' . $id;

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    header('LOCATION: ../../html/admin.php');
?>