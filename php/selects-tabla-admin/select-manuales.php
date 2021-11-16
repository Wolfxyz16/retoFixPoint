<?php
    include("../php/conexion.php");

    try{
        $queryManuales = "SELECT m.* , usuarios.mail FROM manuales m, usuarios WHERE m.cod_autor = usuarios.cod_user LIMIT 15";
        $consulta = $conexion->prepare($queryManuales);
        $consulta -> execute();
        $manuales = $consulta -> fetchAll();

    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<thead>';
        echo '<tr class="encabezado-fila">';
            echo '<th>Titulo</th>';
            echo '<th>Fichero</th>';
            echo '<th>Autor</th>';
            echo '<th>Aprobado</th>';
            echo '<th>Portada</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($manuales as $manual) {
        echo '<tr class="datos-fila">';
            echo '<td>' . $manual['titulo'] . '</td>';
            echo '<td>' . $manual['fichero'] . '</td>';
            echo '<td>' . $manual['mail'] . '</td>';
            echo '<td>' . $manual['aprobado'] . '</td>';
            echo '<td>' . $manual['portada'] . '</td>';
            echo '<td><img src="../img/svg/settings.svg" alt="icono engranaje editar">';
            echo '<img src="../img/svg/trash.svg" alt="icono cubo de basura"></td>';
        echo '<tr>';
    }

    echo '</tbody>';

    echo '<tfoot>';
        echo '<tr class="pie-fila">';
            echo '<td><a href="#">Anterior<a/></td>';
            echo '<td><a href="crear-registro.php">Crear Herramienta</a></td>';
            echo '<td><a href="#">Siguiente</a></td>';
        echo '</tr>';
    echo '</tfoot>';
?>