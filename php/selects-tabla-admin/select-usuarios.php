<?php
    include("../php/conexion.php");

    $query = 'SELECT * FROM usuarios';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $usuarios = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '</thead>';
        echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Apellido</th>';
            echo '<th>Correo</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['name'] . '</td>';
        echo '<td>' . $usuario['surname'] . '</td>';
        echo '<td>' . $usuario['mail'] . '</td>';
        echo '<td><img src="../img/svg/settings.svg" alt="icono engranaje editar">';
        echo '<img src="../img/svg/trash.svg" alt="icono cubo de basura"></td>';
        echo '<tr>';
    }
?>