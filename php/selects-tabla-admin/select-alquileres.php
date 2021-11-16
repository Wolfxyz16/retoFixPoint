<?php
        include("../php/conexion.php");

    $query = 'SELECT a.*, u.mail , h.nombre FROM alquileres a, usuarios u, herramientas h WHERE a.cod_user = u.cod_user AND a.cod_herramienta = h.cod_herramienta';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $alquileres = $consulta -> fetchAll();
         //HACER LAS CONSULTAS ANIDADAS EN USUARIOS Y HERRAMIENTAS
    echo '</thead>';
        echo '<tr>';
            echo '<th>Mail</th>';
            echo '<th>Codigo herramientas</th>';
            echo '<th>Fecha pre-alquiler</th>';
            echo '<th>Inicio alquiler</th>';
            echo '<th>Fin alquiler</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($alquileres as $alquiler) {
        echo '<tr>';
            echo '<td>' . $alquiler['mail'] . '</td>';
            echo '<td>' . $alquiler['nombre'] . '</td>';
            echo '<td>' . $alquiler['fecha_prealquiler'] . '</td>';
            echo '<td>' . $alquiler['fecha_alquiler_inicio'] . '</td>';
            echo '<td>' . $alquiler['fecha_alquiler_fin'] . '</td>';
            echo '<td><img src="../img/svg/settings.svg" alt="icono engranaje editar">';
            echo '<img src="../img/svg/trash.svg" alt="icono cubo de basura"></td>';
        echo '<tr>';
    }
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
   
?>