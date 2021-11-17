<?php
    include('../../php/conexion.php');

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $error = 'El registro no existe';
    }

    $query = 'SELECT * FROM usuarios WHERE cod_user=' . $id . ';';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $usuario = $consulta -> fetchAll();
        echo '<script>console.log("Consulta individual realizada con exito");</script>';
        echo '<script>console.log("' . print_r($usuario) . '");</script>';
    } catch(PDOException $e) {
        echo '<script>console.log("' . $e->getMessage() .'");</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../styles/header.css" type="text/css">
    <link rel="stylesheet" href="../../styles/footer.css" type="text/css">
    <link rel="stylesheet" href="../../styles/boton.css" type="text/css">
    <link rel="stylesheet" href="../../styles/crear-registro.css" type="text/css">

    <link rel="icon" type="image/png" href="../../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Editar usuario</title>
</head>

<body>
    <header class="header">
        <div class="menu">
            <a href="../inicio.html"><img src="../../img/logo_fixpoint_grisoso.png" alt="logo fixpoint"
                    id="logo-fixpoint"></a>
            <div class="item"><span><img src="../../img/logo_fixpoint_simple.png" id="logo_redireccion_inicio"></span>
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
            <a href="../admin.php" class="volver">Volver</a>
        </div>
        <div class="form-container">
            <form action="../../php/editar/editar-usuario.php" method="POST" class="form usuarios visible">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Editar</legend>
                    <label for="nombre">Nombre<input type="text" name="nombre" value="<?php echo $usuario[0]['name']?>"></label>
                    <label for="apellido">Apellido<input type="text" name="apellido" value="<?php echo $usuario[0]['surname']?>"></label>
                    <label for="mail">Email<input type="text" name="mail" value="<?php echo $usuario[0]['mail']?>"></label>
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <input type="submit" value="Actualizar" class="submit" name="submit">
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>