<?php
    include_once('conexion.php');

    $query = 'SELECT * FROM alquileres';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $alquileres = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    foreach ($alquileres as $alquiler) {
        echo '<tr>';
        echo '<td>' . $usuario['name'] . '</td>';
        echo '<td>' . $usuario['surname'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo '<tr>';
    }
?>