<!-- Esta pagina la hizo Yeray -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="icon" type="image/png" href="../img/logo_fixpoint_grisoso.png" sizes="16x16 24x24 36x36 48x48">
    <title>MODO ADMIN</title>
</head>
<body>
    <header>
        <div class="cabecera">
            <section class="contenedor-logo"></section>
            <section class="contenedor-logo" id="contenedor-logo-fixpoint">
                <a href="../html/inicio.html"><img src="../img/logo_fixpoint.png" alt="logo fixpoint"
                        id="logo-fixpoint"></a>
            </section>
            <section class="contenedor-logo" id="contenedor-logo-user">
                <a href=""><img src="../img/user.png" alt="iniciar sesion" id="logo-user"></a>
            </section>
        </div>
    </header>

    <main>
        <section class="menu">
            <h2>MODO ADMIN</h2>
            <ul class="botones-container">
                <li class="enlace">
                    <button type="button" value="Herramientas" class="boton visible" id="boton-herramientas">Herramientas</input>
                </li>
                <li class="enlace">
                    <button type="button" value="Usuarios" class="boton hidden" id="boton-usuarios">Usuarios</button>
                </li>
                <li class="enlace">
                    <button type="button" value="Manuales" class="boton hidden" id="boton-manuales">Manuales</input>
                </li>
                <li class="enlace">
                    <button type="button" value="Alquileres" class="boton hidden" id="boton-alquileres">Alquileres</input>
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