<?php
        if(!isset($_POST['mail'])){
            echo "<script type='text/javascript' alert=(Email mal);</script>";

        } else if (!isset($_POST['password'])) {
            echo "<script type='text/javascript' alert=(Contrasena mal);</script>";
        } else{
            inicioSesion();
        }

    function inicioSesion(){
        try {
            $mail = $_POST['mail'];
            $contrasena = $_POST['password'];
            
            include("conexion.php");
            $consultaUsuario=$conexion->prepare("SELECT name, surname FROM usuarios  WHERE password='".$contrasena."' AND mail='".$mail."'");
            $consultaUsuario -> execute();
            $resultado = $consultaUsuario->fetchAll();
            if(empty($resultado)){
                echo "<script>console.log('La cuenta no existe mal');</script>";
            }else{
                foreach($resultado as $result) {
                    $usuario =$result['name'].' '.$result['surname'];
                    
                }
                session_start();
                $_SESSION['usuario']=$usuario;
                header('Location: ../html/inicio.php');
                exit;
            }
            exit;
        }catch(PDOException $e) {
            echo '<script>console.log(' . $e->getMessage() . ')</script>';
        }    
    }
?>