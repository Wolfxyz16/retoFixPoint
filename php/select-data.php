<?php
    include('conexion.php');

    $query = 'SELECT * FROM data';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $usuarios = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['name'] . '</td>';
        echo '<td>' . $usuario['surname'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo '<tr>';
    }
?>