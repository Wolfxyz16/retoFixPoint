<?php
    // select para rellenar el select html
    $query_usuarios = 'SELECT cod_user,mail FROM usuarios';
    $query_herramientas = 'SELECT cod_herramienta,nombre FROM herramientas';

    include("../../php/conexion.php");

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

<?php
    // select de alquileres
    include('../../php/conexion.php');

    if ( isset( $_GET['id'] )) {
        $id = $_GET['id'];
    } else {
        $error = 'El alquiler no existe';
    }

    $query = 'SELECT * FROM alquileres WHERE cod_alquiler=' . $id . ';';

    try{
        $consulta = $conexion->prepare($query);
        $consulta -> execute();
        $alquiler = $consulta -> fetchAll();
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
    <title>Editar alquiler</title>
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
            <form action="../php/insertar/crear-alquiler.php" method="POST" class="form alquileres visble">
                <fieldset class="fieldset">
                    <legend class="titulo-formulario">Editar alquiler</legend>
                    <label for="usuario">
                        Usuario
                        <select name="usuario" id="select-user" class="select" required>
                            <?php
                                foreach ($usuarios as $usuario) {
                                    if ($alquiler[0]['cod_user'] == $usuario['cod_user']) {
                                        echo '<option value="'.$usuario['cod_user'].'" selected>'.$usuario['mail'].'</option>';
                                    } else {
                                        echo '<option value="'.$usuario['cod_user'].'">'.$usuario['mail'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </label>
                    <label for="herramienta">
                        Herramienta
                        <select name="herramienta" id="select-herramienta" class="select" required>
                            <?php
                                foreach ($herramientas as $herr) {
                                    if ($alquiler[0]['cod_herramienta'] == $herr['cod_herramienta']) {
                                        echo '<option value="'.$herr['cod_herramienta'].'" selected>'.$herr['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$herr['cod_herramienta'].'">'.$herr['nombre'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </label>
                    <label for="fecha-fin">Fin del alquiler<input type="date" name="fecha_alquiler_fin" value="<?php echo $alquiler[0]['fecha_alquiler_fin']?>"></label>
                    <input type="submit" value="Actualizar" class="submit" name="submit">
                </fieldset>
        </div>
    </main>
</body>

</html>