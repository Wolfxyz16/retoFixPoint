<!-- Esta pagina la hizo Yeray -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/boton.css">
    <link rel="stylesheet" href="../styles/admin.css">
    
    <script  type="module" src="../js/menu.js"></script>
    
    <link rel="icon" type="image/png" href="../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>MODO ADMIN</title>
</head>

<body>
    <header class="header">
        <div class="menu">
            <a href="" id="a-logo-fixpoint"><img src="img/logo_fixpoint_grisoso.png" alt="logo fixpoint" id="logo-fixpoint"></a>
            <div class="item" id="home"><span><img src="img/logo_fixpoint_simple.png" id="logo_redireccion_inicio"></span></div>
            <div class="item" id="library"><span>Biblioteca</span></div>
            <div class="item" id="guide"><span>Manuales</span></div>
            <div class="item" id="about"><span>Sobre Nosotros</span></div>
            <?php
                    session_start();
                    if(isset( $_SESSION['usuario']) ) {
                        if ($_SESSION['admin']==TRUE) {
                            print '<div class="item" id="admin"><span id="menu-admin">Administrador<div id="cerrar-sesion"><span>Cerrar Sesion</span></div><div id="modo-admin"><span>Modo Admin</span></div></span></div>';
                        }else if($_SESSION['admin']==FALSE){
                             print '<div class="item" id="usuario"><span id="menu-usuario">' . $_SESSION['usuario'] . ' <div id="cerrar-sesion"><span>Cerrar Sesion</span></div></span></div>';
                        }
                    } else {
                        print '<div class="item" id="iniciosesion" ><span>Inicio Sesion/Registro</span></div>';
                    }
                    
                ?>
            <div id="label"><span class="hamburger"></span></div>
        </div>
    </header>

    <main>
        <section class="menu_admin">
            <h2>MODO ADMIN</h2>
            <ul class="botones-container">
                <li class="enlace">
                    <button type="button" value="Herramientas" class="boton" id="boton-herramientas">Herramientas</input>
                </li>
                <li class="enlace">
                    <button type="button" value="Usuarios" class="boton" id="boton-usuarios">Usuarios</button>
                </li>
                <li class="enlace">
                    <button type="button" value="Manuales" class="boton" id="boton-manuales">Manuales</input>
                </li>
                <li class="enlace">
                    <button type="button" value="Alquileres" class="boton" id="boton-alquileres">Alquileres</input>
                </li>
            </ul>
        </section>

        <section class="tabla-container">

            <table id="tabla-herramientas" class="tabla">
                <?php include_once('../php/selects-tabla-admin/select-herramientas.php');?>
            </table>

            <table id="tabla-usuarios" class="tabla">
                <?php include_once('../php/selects-tabla-admin/select-usuarios.php');?>
            </table>

            <table id="tabla-manuales" class="tabla">
                <?php include_once('../php/selects-tabla-admin/select-manuales.php');?>
            </table>

            <table id="tabla-alquileres" class="tabla">
                <?php include_once('../php/selects-tabla-admin/select-alquileres.php');?>
            </table>

            <section class="navegacion-container">
                <a href="#" class="anterior navegacion">&laquo; Anterior</a>
                <a href="#" class="crear navegacion">Crear nuevo registro</a>
                <a href="#" class="siguiente navegacion">Siguiente &raquo;</a>
            </section>
        </section>
    </main>
</body>
</html>