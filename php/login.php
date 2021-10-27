<?php
    include('conexion.php');

    $userMail = '';
    $userPassword = '';

    $query = 'SELECT FROM usuarios password WHERE mail=$userMail';

    try {
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
        echo 'contrasenna incorrecta'; 
    }

?>