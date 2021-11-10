<?php
    function test_inputs($variable) {
        $variable = trim($variable); // elimina espacios en blanco
        $variable = stripslashes($variable); // elimina las contrabarras
        return $variable;
    }

    if (!isset( $_REQUEST['nombre'] )) {
        $emailErr = "Nombre es necesario";;
    } else {
        $email = test_inputs($_REQUEST['nombre']);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Solo letras y espacios en blanco";
        }
    }
    
    if (!isset( $_REQUEST['email'] )) {
        $emailErr = "E-mail es necesario";;
    } else {
        $email = test_inputs($_REQUEST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (!isset ( $_REQUEST['mensaje'] )) {
        $mensjErr = "Es necesario el cuerpo del mensaje";
    } else {
        $mensaje = test_inputs($_REQUEST['mensaje']); // faltaria comprobar la longitud del mensaje
    }

    if (mail('fixpoint@fixpoint.com' , 'mensaje de ' . $nombre , $mensaje)) {
        echo 'email enviado exitosamente';
    } else {
        $mailErr = 'fallo en el envio del email';
    }

    


?>