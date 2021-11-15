<?php
        include("../php/conexion.php");


    try{
        $queryManuales = "SELECT m.* , usuarios.mail FROM manuales m, usuarios WHERE m.cod_autor = usuarios.cod_user";
        $consulta = $conexion->prepare($queryManuales);
        $consulta -> execute();
        $manuales = $consulta -> fetchAll();

    echo '</thead>';
        echo '<th>';
            echo '<td>Titulo</td>';
            echo '<td>Fichero</td>';
            echo '<td>Autor</td>';
            echo '<td>Aprobado</td>';
            echo '<td>Portada</td>';
        echo '<th>';
    echo '</thead>';

    echo '<tbody>';

    foreach ($manuales as $manual) {
        echo '<tr>';
        echo '<td>' . $manual['titulo'] . '</td>';
        echo '<td>' . $manual['fichero'] . '</td>';
        echo '<td>' . $manual['mail'] . '</td>';
        echo '<td>' . $manual['aprobado'] . '</td>';
        echo '<td>' . $manual['portada'] . '</td>';
        echo '<tr>';
    }
} catch(PDOException $e) {
    echo '<script>console.log("' . $e->getMessage() .'");</script>';
}
?>