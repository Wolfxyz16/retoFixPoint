<?php
  function alquilerHerrammienta() {
    try {
        include("../php/conexion.php");
        $insert = $conexion->prepare('INSERT INTO alquileres (cod_user, cod_herramienta, fecha_prealquiler) VALUES (:usuario, :herramienta, :fecha)');
        session_start();
        $usuarios = $_SESSION['cod_user'];
        $herramienta=$_GET['id'];
        $fecha=date('Y-m-d');
        $insert->execute( array('usuario'=>$usuarios, 'herramienta'=>$herramienta, 'fecha'=>$fecha));
    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
    }

    try {
        include("../php/conexion.php");
        $id = $_GET['id'];
        $disponibilidad='No Disponible';
        $update=$conexion->prepare('UPDATE herramientas SET disponibilidad = :disponibilidad WHERE cod_herramienta = :id');
        $update->execute( array('id'=>$id, 'disponibilidad'=>$disponibilidad));
        header('Location: ../html/biblioteca.php');
    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
    }
    
  }

  if (isset($_GET['alquiler'])) {
    alquilerHerrammienta();
  }
?>