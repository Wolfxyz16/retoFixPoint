<?php
    $query_usuarios = 'SELECT cod_user,mail FROM usuarios';
    $query_herramientas = 'SELECT cod_herramienta,nombre FROM herramientas';

    include("../php/conexion.php");

    try{
        $consulta = $conexion->prepare($query_usuarios);
        $consulta -> execute();
        $usuarios = $consulta -> fetchAll();
        echo '<script>console.log("Consulta array de usuarios exitosa");</script>';
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }

    try{
        $consulta = $conexion->prepare($query_herramientas);
        $consulta -> execute();
        $herramientas = $consulta -> fetchAll();
        echo '<script>console.log("Consulta array de herramientas exitosa");</script>';
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/header.css" type="text/css">
    <link rel="stylesheet" href="../styles/footer.css" type="text/css">
    <link rel="stylesheet" href="../styles/boton.css" type="text/css">
    <link rel="stylesheet" href="../styles/crear-registro.css" type="text/css">

    <script src="../js/crear-registro.js"></script>

    <link rel="icon" type="image/png" href="../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Crear</title>
</head>

<body>
    <header class="cabecera">
        <div class="menu">
            <a href="html/inicio.html"><img src="../img/logo_fixpoint_grisoso.png" alt="logo fixpoint"
                    id="logo-fixpoint"></a>
            <div class="item"><span><img src="../img/logo_fixpoint_simple.png" id="logo_redireccion_inicio"></span>
            </div>
            <div class="item"><span>Biblioteca</span></div>
            <div class="item"><span>Manuales</span></div>
            <div class="item"><span>Sobre Nosotros</span></div>
            <?php
                    session_start();
                    if(isset( $_SESSION['usuario']) ) {
                        if ($_SESSION['admin']==TRUE) {
                            print '<div class="item" id="admin"><span id="menu-admin">Administrador<div id="cerrar-sesion"><span>Cerrar Sesion</span></div><div id="modo-admin"><span>Modo Admin</span></div></span></div>';
                        }else if($_SESSION['admin']==FALSE){
                             print '<div class="item" id="usuario"><span id="menu-usuario">' . $_SESSION['usuario'] . ' <div id="cerrar-sesion"><span>Cerrar Sesion</span></div></span></div>';
                        }
                    } else {
                        print '<div class="item" id="iniciosesion"><span>Inicio Sesion/Registro</span></div>';
                    }
                    
                ?>
            <div id="label"><span class="hamburger"></span></div>
        </div>
    </header>

    <main>
        <div class="first-container">
            <select name="tabla" id="select-tabla">
                <option value="herramientas" selected>Herramientas</option>
                <option value="manuales">Manuales</option>
                <option value="usuarios">Usuarios</option>
                <option value="alquileres">Alquileres</option>
            </select>
            
            <a href="admin.php" class="volver">Volver</a>
        </div>

        <div class="form-container">
            <form action="../php/insertar/crear-herramienta.php" method="POST" enctype="multipart/form-data" class="form herramientas visible">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Crear una herramienta</legend>
                    <label for="nombre">Nombre de la herramienta<input type="text" name="nombre" required></label>
                    <label for="marca_modelo">Marca y modelo<input type="text" name="marca_modelo" required></label>
                    <label for="foto">Foto<input type="file" name="foto" required></label>
                    <input type="submit" value="Crear" class="submit" name="submit">
                </fieldset>
            </form>
            
            <form action="../php/insertar/crear-manual.php" method="POST" enctype="multipart/form-data" class="form manuales oculto">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Crear un manual</legend>
                    <label for="titulo">Titulo<input type="text" name="titulo" required></label>
                    <label for="portada">Portada<input type="file" name="portada" required></label>
                    <label for="fichero">Fichero<input type="file" name="fichero" required></label>
                    <input type="submit" value="Crear" class="submit" name="submit">
                </fieldset>
            </form>

            <form action="../php/insertar/crear-usuario.php" method="POST" class="form usuarios oculto">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Crear un usuario</legend>
                    <label for="nombre">Nombre<input type="text" name="nombre" required></label>
                    <label for="apellido">Apellido<input type="text" name="apellido" required></label>
                    <label for="mail">Email<input type="email" name="mail" required></label>
                    <label for="password">Contrase&ntilde;a<input type="password" name="password" required></label>
                    <input type="submit" value="Crear" class="submit" name="submit">
                </fieldset>
            </form>

            <form action="../php/insertar/crear-alquiler.php" method="POST" class="form alquileres oculto">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Crear un alquiler</legend>
                    <select name="usuario" id="select-user" class="select" required>
                        <?php
                            foreach ($usuarios as $usuario) {
                                echo '<option value="'.$usuario['cod_user'].'">'.$usuario['mail'].'</option>';
                            }
                        ?>
                    </select>
                    <select name="herramienta" id="select-herramienta" class="select" required>
                        <?php
                            foreach ($herramientas as $herr) {
                                echo '<option value="'.$herr['cod_herramienta'].'">'.$herr['nombre'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="hidden" value="<?php /*date_create( NULL ) */?>" name="fecha_actual">
                    <input type="submit" value="Crear" class="submit" name="submit">
                </fieldset>
            </form>
        </div>
    </main>

</body>

</html>