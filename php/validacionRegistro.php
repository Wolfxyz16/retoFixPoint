<?php
        if(!isset($_POST['nombre'])){
            echo "<script type='text/javascript' alert=('El campo del nombre es obligatorio');</script>";

        } else if (!isset($_POST['apellido'])) {
            echo "<script type='text/javascript' alert=('El campo del apellido es obligatorio');</script>";

        }else if (!isset($_POST['email'])) {
            echo "<script type='text/javascript' alert=('El campo del correo es obligatorio');</script>";

        }else if (!isset($_POST['contrasena'])) {
            echo "<script type='text/javascript' alert=('El campo de la contraseña es obligatorio');</script>";

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
            $userPasswordEncryp = hash('sha512' , $contrasena);
            $insert=$conexion->prepare('INSERT INTO usuarios (name, surname, mail, password) VALUES (:nombre, :apellido, :email, :contrasena)');
            $insert->execute( array('nombre'=>$nombre, 'apellido'=>$apellido, 'email'=>$email, 'contrasena'=>$userPasswordEncryp));
            header('Location: ../html/login.html');
            exit;
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>