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
        echo '<th>';
            echo '<td>Nombre</td>';
            echo '<td>Apellido</td>';
            echo '<td>Correo</td>';
        echo '<th>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($usuarios as $usuario) {
        echo '<tr>';
        echo '<td>' . $usuario['name'] . '</td>';
        echo '<td>' . $usuario['surname'] . '</td>';
        echo '<td>' . $usuario['mail'] . '</td>';
        echo '<tr>';
    }
?>