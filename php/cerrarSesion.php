<?php
    session_start();//abrimos sesion
    session_destroy();//cerramos sesion
    header("Location: ../");
    die();//destruimos el php
?>