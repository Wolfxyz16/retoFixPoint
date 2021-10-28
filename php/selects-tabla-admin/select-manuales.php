<?php
    include_once('conexion.php');

    $query = 'SELECT * FROM manuales';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $manuales = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    foreach ($manuales as $manual) {
        echo '<tr>';
        echo '<td>' . $manual['titulo'] . '</td>';
        echo '<td>' . $manual['fichero'] . '</td>';
        echo '<td>' . $manual['portada'] . '</td>';
        echo '<td>' . $manual['cod_autor'] . '</td>';
        echo '<td>' . $manual['aprobado'] . '</td>';
        echo '<tr>';
    }
?>