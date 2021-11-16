<?php
        if(!isset($_POST['mail'])){
            echo "<script>alert('No se ha recibido ningun email');window.location.href='../html/login.html';</script>";


        } else if (!isset($_POST['password'])) {
            echo "<script>alert('No se ha recibido ninguna password');window.location.href='../html/login.html';</script>";
        } else{
            inicioSesion();
        }

    function inicioSesion(){
        try {
            $mail = $_POST['mail'];
            $contrasena = $_POST['password'];
            
            include("conexion.php");
            $userPasswordEncryp = hash('sha512' , $contrasena);
            $consultaUsuario=$conexion->prepare("SELECT name, surname, mail FROM usuarios  WHERE password='".$userPasswordEncryp."' AND mail='".$mail."'");
            $consultaUsuario -> execute();
            $resultado = $consultaUsuario->fetchAll();
            if(empty($resultado)){
                echo "<script>alert('La cuenta no existe');window.location.href='../html/login.html';</script>";
            }else{
                session_start();
                foreach($resultado as $result) {
                    $usuario =$result['name'].' '.$result['surname'];
                    if ( $result['mail'] == 'admin' ) { 
                        $_SESSION['admin'] = TRUE; 
                    }else{
                        $_SESSION['admin'] = FALSE;
                    }
                }
                
                $_SESSION['usuario']=$usuario;
                echo "<script>
                alert('Bienvenido $usuario');
                window.location.href='../';
                </script>";
                exit;
            }
            exit;
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>