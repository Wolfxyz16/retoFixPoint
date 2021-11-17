<?php
    include("../php/conexion.php");

    try{
        $queryManuales = "SELECT m.* , usuarios.mail FROM manuales m, usuarios WHERE m.cod_autor = usuarios.cod_user";
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
        if ($manual['aprobado']) {
            $aprobado = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
          </svg>';
        }
        else {
            $aprobado = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
          </svg>';
        }
        echo '<tr class="datos-fila">';
            echo '<td>' . $manual['titulo'] . '</td>';
            echo '<td>' . $manual['fichero'] . '</td>';
            echo '<td>' . $manual['mail'] . '</td>';
            echo '<td>' . $aprobado . '</td>';
            echo '<td>' . $manual['portada'] . '</td>';
            echo '<td><a href="editar-registros/editar-manual.php?id='. $manual['cod_manual'] . '"><img src="../img/svg/settings.svg" alt="icono engranaje editar"></a>';
            echo '<a href="../php/borrar/borrar-manual.php?id='. $manual['cod_manual'] . '"><img src="../img/svg/trash.svg" alt="icono cubo de basura"></a></td>';
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