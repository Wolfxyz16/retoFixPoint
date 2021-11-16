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
        echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Marca y modelo</th>';
            echo '<th>Disponible</th>';
            echo '<th>Foto</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($herramientas as $herramienta) {
        echo '<tr>';
        echo '<td>' . $herramienta['nombre'] . '</td>';
        echo '<td>' . $herramienta['marca_y_modelo'] . '</td>';
        echo '<td>' . $herramienta['disponibilidad'] . '</td>';
        echo '<td>' . $herramienta['foto'] . '</td>';
        echo '<td><img src="../img/svg/settings.svg" alt="icono engranaje editar">';
        echo '<img src="../img/svg/trash.svg" alt="icono cubo de basura"></td>';
        echo '<tr>';
    }
?>