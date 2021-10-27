<?php
    include('conexion.php');

    $query = 'SELECT * FROM herramientas';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $herramientas = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    foreach ($herramientas as $herramienta) {
        echo '<tr>';
        echo '<td>' . $usuario['nombre'] . '</td>';
        echo '<td>' . $usuario['marca_y_modelo'] . '</td>';
        echo '<td>' . $usuario['disponibilidad'] . '</td>';
        echo '<td>' . $usuario['foto'] . '</td>';
        echo '<tr>';
    }
?>