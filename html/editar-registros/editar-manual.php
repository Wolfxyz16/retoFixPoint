<?php
    include('../../php/conexion.php');

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $error = 'El registro no existe';
    }

    $query = 'SELECT * FROM manuales WHERE cod_manual=' . $id . ';';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $manual = $consulta -> fetchAll();
        echo '<script>console.log("Consulta individual realizada con exito");</script>';
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

    <link rel="stylesheet" href="../../styles/header.css" type="text/css">
    <link rel="stylesheet" href="../../styles/footer.css" type="text/css">
    <link rel="stylesheet" href="../../styles/boton.css" type="text/css">
    <link rel="stylesheet" href="../../styles/crear-registro.css" type="text/css">

    <link rel="icon" type="image/png" href="../../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Editar manual <?php echo $manual[0]['titulo'] ?></title>
</head>

<body>
    <header class="cabecera">
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
            <form action="../php/editar/editar-manual.php" method="POST" class="form manuales visible">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Editar</legend>
                    <label for="titulo">Titulo<input type="text" name="titulo" value="<?php echo $manual[0]['titulo']?>"></label>
                    <label for="portada">Portada<input type="file" name="portada" value="<?php echo $manual[0]['portada']?>"></label>
                    <label for="fichero">Fichero<input type="file" name="fichero" value="<?php echo $manual[0]['fichero']?>"></label>
                    <input type="hidden" value="<?php echo $manual[0]['cod_manual']?>" name="id">
                    <input type="submit" value="Actualizar" class="submit" name="submit">
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>