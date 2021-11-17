<?php
   

    try{
        include("../php/conexion.php");

        $query = 'SELECT * FROM herramientas LIMIT 15';
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $herramientas = $consulta -> fetchAll();
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
    
    echo '<thead>';
        echo '<tr class="encabezado-fila">';
            echo '<th>Nombre</th>';
            echo '<th>Marca y modelo</th>';
            echo '<th>Disponible</th>';
            echo '<th>Foto</th>';
            echo '<th>Editar</th>';
        echo '<tr>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($herramientas as $herramienta) {
        echo '<tr class="datos-fila">';
            echo '<td>' . $herramienta['nombre'] . '</td>';
            echo '<td>' . $herramienta['marca_y_modelo'] . '</td>';
            echo '<td>' . $herramienta['disponibilidad'] . '</td>';
            echo '<td>' . $herramienta['foto'] . '</td>';
            echo '<td><a href="editar-registros/editar-herramienta.php?id='. $herramienta['cod_herramienta'] . '"><img src="../img/svg/settings.svg" alt="icono engranaje editar"></a>';
            echo '<a href="../php/borrar/borrar-herramienta.php?id="'. $herramienta['cod_herramienta'] . '"><img src="../img/svg/trash.svg" alt="icono cubo de basura"></a></td>';
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