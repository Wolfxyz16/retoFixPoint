<?php
        if(!isset($_POST['nombre'])){
            echo "<script type='text/javascript' alert=(Nombre mal);</script>";

        } else if (!isset($_POST['apellido'])) {
            echo "<script type='text/javascript' alert=(Apellido mal);</script>";

        }else if (!isset($_POST['email'])) {
            echo "<script type='text/javascript' alert=(email mal);</script>";

        }else if (!isset($_POST['contrasena'])) {
            echo "<script type='text/javascript' alert=(Contraseña mal);</script>";

        } else{
            crearUsuario();
        }

    function crearUsuario(){
        try {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];
            include("conexion.php");
            $insert=$conexion->prepare('INSERT INTO usuarios (name, surname, mail, password) VALUES (:nombre, :apellido, :email, :contrasena)');
            $insert->execute( array('nombre'=>$nombre, 'apellido'=>$apellido, 'email'=>$email, 'contrasena'=>$contrasena));
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>