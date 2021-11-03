<?php
        if( !isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['email']) || !isset($_POST['contrasenna'])) {
            error();

        } else{
            crearUsuario();
        }
    
    function error() {
        echo "<script type='text/javascript' alert=('Algo esta mal');</script>";
    }

    function crearUsuario(){
        try {
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];

            include("conexion.php");
            $insert = $conexion->prepare('INSERT INTO usuarios (name, surname, mail, password) VALUES (:nombre, :apellido, :email, :contrasena)');

            $insert -> execute( array('nombre'=>$nombre, 'apellido'=>$apellido, 'email'=>$email, 'contrasena'=>$contrasena));
            
            header('Location: /html/popup.html');
            
            exit;
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>