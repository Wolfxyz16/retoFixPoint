<?php
    if ( isset($_SESSION['user']) ) {
        echo 'hay sesion';
    } else if ( isset($_POST['user']) && isset($_POST['password']) ){
        $userMail = '';
        $userPassword = '';
    }

    $query = 'SELECT FROM usuarios password WHERE mail=$userMail';

    try {
        include_once('conexion.php');
        $select = $conexion -> prepare($query);
        $select -> execute();
        $password = $select -> fetchColumn();

    } catch (PDOException $e) {
        echo '<script>console.log(' . "La he liado mirando la contrasena: " . $e->getMessage() . ')</script>';
        die();
    }

    $userPasswordEncryp = hash('sha512' , $userPassword);

    if ( $userPasswordEncryp == $password ) {
        header('LOCATION:../html/admin.html');
    }

    else {
        $errorLogin = 'usuario o contrasen&nacute;a incorrecta';
        include_once('../html/login.phps'); 
    }
    
?>