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
    
    echo '</thead>';
        echo '<th>';
            echo '<td>Nombre</td>';
            echo '<td>Marca y modelo</td>';
            echo '<td>Disponible</td>';
            echo '<td>Foto</td>';
        echo '<th>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($herramientas as $herramienta) {
        echo '<tr>';
        echo '<td>' . $herramienta['nombre'] . '</td>';
        echo '<td>' . $herramienta['marca_y_modelo'] . '</td>';
        echo '<td>' . $herramienta['disponibilidad'] . '</td>';
        echo '<td>' . $herramienta['foto'] . '</td>';
        echo '<tr>';
    }
?>