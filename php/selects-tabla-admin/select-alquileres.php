<?php
        include("../php/conexion.php");

    $query = 'SELECT a.*, u.mail , h.nombre FROM alquileres a, usuarios u, herramientas h WHERE a.cod_user = u.cod_user AND a.cod_herramienta = h.cod_herramienta';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $alquileres = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    echo '<thead>';
        echo '<tr class="encabezado-fila">';
            echo '<th>Mail</th>';
            echo '<th>Codigo herramientas</th>';
            echo '<th>Fecha pre-alquiler</th>';
            echo '<th>Inicio alquiler</th>';
            echo '<th>Fin alquiler</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($alquileres as $alquiler) {
        echo '<tr class="datos-fila">';
            echo '<td>' . $alquiler['mail'] . '</td>';
            echo '<td>' . $alquiler['nombre'] . '</td>';
            echo '<td>' . $alquiler['fecha_prealquiler'] . '</td>';
            echo '<td>' . $alquiler['fecha_alquiler_inicio'] . '</td>';
            echo '<td>' . $alquiler['fecha_alquiler_fin'] . '</td>';
            echo '<td><a href="editar-registros/editar-alquiler.php?id='. $alquiler['cod_alquiler'] . '"><img src="../img/svg/settings.svg" alt="icono engranaje editar"></a>';
            echo '<a href="../php/borrar/borrar-alquiler.php?id='. $alquiler['cod_alquiler'] . '"><img src="../img/svg/trash.svg" alt="icono cubo de basura"></a></td>';
        echo '<tr>';
    }
    
    echo '</tbody>';

    echo '<tfoot>';
    echo '</tfoot>';
?>