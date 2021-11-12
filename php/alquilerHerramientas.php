<?php
  function alquilerHerrammienta() {
    try {
        include("../php/conexion.php");
        $insert = $conexion->prepare('INSERT INTO alquileres (cod_user, cod_herramienta, fecha_preaquiler) VALUES (:usario, :herramienta, :fecha)');
        session_start();
        $usuarios = explode(" ", $_SESSION['usuario']);
        $herramienta=$_GET['id'];
        $fecha=date('Y-m-d');
        $insert -> execute( array('usuario'=>$usuarios[2], 'herramienta'=>$herramienta, 'fecha'=>$fecha));
    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
    }

    try {
        include("../php/conexion.php");
        $id = $_GET['id'];
        $disponibilidad='No Disponible';
        $update=$conexion->prepare('UPDATE herramientas SET disponibilidad = :disponibilidad WHERE cod_herramienta = :id');
        $update->execute( array('id'=>$id, 'disponibilidad'=>$disponibilidad));
        echo '<script>console.log("Error en la update")</script>';
        header('Location: ../html/biblioteca.php');
    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
    }
    
  }

  if (isset($_GET['alquiler'])) {
    alquilerHerrammienta();
  }
?>