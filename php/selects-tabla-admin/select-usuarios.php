<?php
    include("../php/conexion.php");

    $query = 'SELECT * FROM usuarios LIMIT 15';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $usuarios = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<thead>';
        echo '<tr class="encabezado-fila">';
            echo '<th>Nombre</th>';
            echo '<th>Apellido</th>';
            echo '<th>Correo</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($usuarios as $usuario) {
        echo '<tr class="datos-fila">';
            echo '<td>' . $usuario['name'] . '</td>';
            echo '<td>' . $usuario['surname'] . '</td>';
            echo '<td>' . $usuario['mail'] . '</td>';
            echo '<td><img src="../img/svg/settings.svg" alt="icono engranaje editar">';
            echo '<img src="../img/svg/trash.svg" alt="icono cubo de basura"></td>';
        echo '<tr>';
    }

    echo '</tbody>';

    echo '<tfoot>';
        echo '<tr class="pie-fila">';
            echo '<td>Anterior</td>';
            echo '<td>Crear Usuario</td>';
            echo '<td>Siguiente</td>';
        echo '</tr>';
    echo '</tfoot>';
?>