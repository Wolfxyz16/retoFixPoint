<?php
    $server = 'localhost';
    $dbname = 'fixpoint';
    $username = 'root';
    $password = '';

    // fixpoint-database.cfhjlaahn7bu.us-east-1.rds.amazonaws.com:3306

    // admin
    // xfyRa83Nk73RqsMS

    // fixpoint
    // Fixpoint123

    try {
        $conexion = new PDO("mysql:host=$server;dbname=$dbname" , $username , $password);
        echo '<script>console.log("Oye, que la base de datos funciona")</script>';

    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
        die();
    }
    
?>