<?php
    include_once('conexion.php');

    $queryManuales = 'SELECT m.* , u.mail FROM manuales m, usuarios u WHERE m.cod_autor = u.cod_user';

    try{
        $consulta = $conexion->prepare($queryManuales);
        $consulta -> execute();
        $manuales = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<tr>';
        echo '<th>Titulo</th>';
        echo '<th>Fichero</th>';
        echo '<th>Autor</th>';
        echo '<th>Aprobado</th>';
        echo '<th>Portada</th>';
    echo '<tr>';

    foreach ($manuales as $manual) {
        echo '<tr>';
        echo '<td>' . $manual['titulo'] . '</td>';
        echo '<td>' . $manual['fichero'] . '</td>';
        echo '<td>' . $manual['mail'] . '</td>';
        echo '<td>' . $manual['aprobado'] . '</td>';
        echo '<td>' . $manual['portada'] . '</td>';
        echo '<tr>';
    }
?>