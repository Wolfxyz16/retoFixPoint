<?php
        include("../php/conexion.php");

    $query = 'SELECT a.*, u.mail , h.nombre FROM alquileres a, usuarios u, herramientas h WHERE a.cod_user = u.cod_user AND a.cod_herramienta = h.cod_herramienta';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $alquileres = $consulta -> fetchAll();
         //HACER LAS CONSULTAS ANIDADAS EN USUARIOS Y HERRAMIENTAS
    echo '</thead>';
        echo '<th>';
            echo '<td>email</td>';
            echo '<td>cod_herramienta</td>';
            echo '<td>fecha_prealquiler</td>';
            echo '<td>alquiler inicio</td>';
            echo '<td>alquiler fin</td>';
        echo '<th>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($alquileres as $alquiler) {
        echo '<tr>';
        echo '<td>' . $alquiler['mail'] . '</td>';
        echo '<td>' . $alquiler['nombre'] . '</td>';
        echo '<td>' . $alquiler['fecha_prealquiler'] . '</td>';
        echo '<td>' . $alquiler['fecha_alquiler_inicio'] . '</td>';
        echo '<td>' . $alquiler['fecha_alquiler_fin'] . '</td>';
        echo '<tr>';
    }
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
   
?>