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
            echo '<td><a href="editar-registros/editar-usuario.php?id='. $usuario['cod_user'] . '"><img src="../img/svg/settings.svg" alt="icono engranaje editar"></a>';
            echo '<a href="/editar-registros/editar-usuario.php?id="'. $usuario['cod_user'] . '"><img src="../img/svg/trash.svg" alt="icono cubo de basura"></a></td>';
        echo '<tr>';
    }

    echo '</tbody>';

    echo '<tfoot>';
        echo '<tr class="pie-fila">';
            echo '<td><a href="#">Anterior<a/></td>';
            echo '<td><a href="#">Siguiente</a></td>';
        echo '</tr>';
    echo '</tfoot>';
?>