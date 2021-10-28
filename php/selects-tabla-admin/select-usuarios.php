<?php
    include_once('conexion.php');

    $query = 'SELECT * FROM usuarios';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $usuarios = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<tr>';
        echo '<td>Nombre</td>';
        echo '<td>Apellidos</td>';
        echo '<td>Email</td>';
    echo '<tr>';

    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['name'] . '</td>';
        echo '<td>' . $usuario['surname'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo '<tr>';
    }
?>