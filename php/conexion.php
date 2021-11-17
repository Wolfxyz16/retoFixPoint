<?php
    $server = 'fixpoint-database.cfhjlaahn7bu.us-east-1.rds.amazonaws.com';
    $port = "3306";
    $dbname = 'fixpoint';
    $username = 'admin';
    $password = 'xfyRa83Nk73RqsMS';

    // fixpoint-database.cfhjlaahn7bu.us-east-1.rds.amazonaws.com:3306

    // contrasena para entrar a la base de datos
    // admin
    // xfyRa83Nk73RqsMS

    // fixpoint
    // Fixpoint123

    try {
        $conexion = new PDO("mysql:host=$server;port=$port;dbname=$dbname" , $username , $password);
        echo '<script>console.log("entre a la base de datos")</script>';
    } catch (PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() . '")</script>';
        die();
    }
    
?>