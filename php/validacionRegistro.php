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
            $consultaUsuario=$conexion->prepare("SELECT name, surname, mail FROM usuarios  WHERE password='".$userPasswordEncryp."' AND mail='".$email."'");
            $consultaUsuario -> execute();
            $resultado = $consultaUsuario->fetchAll();
            foreach($resultado as $result) {
                $usuario =$result['name'].' '.$result['surname'];
                if ( $result['mail'] == 'admin' ) { 
                    $_SESSION['admin'] = true; 
                }else{
                    $_SESSION['admin'] = false;
                }
            }
            echo "<script>
            alert('Se ha registrado con exito, inicie sesion para disfrutar de su acceso como socio');
            window.location.href='../html/login.html';
            </script>";
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>