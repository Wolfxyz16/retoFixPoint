<?php
   

    try{
        include("../php/conexion.php");

        $query = 'SELECT * FROM herramientas';
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $herramientas = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<th>';
        echo '<th>Nombre</th>';
        echo '<th>Marca y modelo</th>';
        echo '<th>Disponible</th>';
        echo '<th>Foto</th>';
    echo '<th>';

    foreach ($herramientas as $herramienta) {
        echo '<tr>';
        echo '<td>' . $herramienta['nombre'] . '</td>';
        echo '<td>' . $herramienta['marca_y_modelo'] . '</td>';
        echo '<td>' . $herramienta['disponibilidad'] . '</td>';
        echo '<td>' . $herramienta['foto'] . '</td>';
        echo '<tr>';
    }
?>