<?php
    $server = 'localhost';
    $dbname = 'fixpoint';
    $username = 'root';
    $password = '';

    try {
        $conexion = new PDO('mysql:host=$server;dbname=$dbname' , $username , $password);
        echo '<script>console.log("Oye, que la base de datos funciona")</script>';

    } catch (PDOException $e) {
        echo '<script>console.log(' . $e->getMessage() . ')</script>';
        die();
    }
    
?>