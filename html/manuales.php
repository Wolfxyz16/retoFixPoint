<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/boton.css">
    <link rel="stylesheet" href="../styles/manuales.css">
    
    <script type="module" src="../js/menu.js"></script>
    <script type="module" src="../js/manuales.js"></script>
    
    <link rel="icon" type="image/png" href="../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Manuales</title>
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
        <div class="contenedor-uno">
            <div class="contenedor-uno-linea">
                <h1>Manuales</h1>
                <form class="contenedor_buscar" method="post">
                    <input class="buscador" type="search" name="buscador" placeholder="B&uacute;squeda...">
                    <button id="buscar_boton" class="boton" value="Buscar" type="submit" name="enviar">Buscar</button>
                </form>
            </div>

            <div class="contenedor-uno-linea">
                <select class="tipo_manual" id="tipo_manual">
                    <option value="" selected disabled></option>
                    <option value="Caladora">Caladora</option>
                    <option value="Aspiradora">Aspiradora</option>
                    <option value="Radial">Radial</option>
                </select>
                <div class="ordenar_por">
                    <label>Ordenar por</label>
                    <select class="A-Z" id="orden">
                        <option value="ASC">A - Z</option>
                        <option value="DESC">Z - A</option>
                    </select>
                </div>
            </div>
        </div>
        <section id="manuales">
            <?php
            // Cuántos productos mostrar por página
            $productosPorPagina = 16;
            // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
            $pagina = 1;
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            };
            // Necesitamos el conteo para saber cuántas páginas vamos a mostrar
            try {
                include("../php/conexion.php");
                $consultaConteo = $conexion->query("SELECT count(*) AS conteo FROM manuales");
                $conteo = $consultaConteo->fetchObject()->conteo;
                $paginas = ceil($conteo / $productosPorPagina);
            } catch (PDOException $e) {
                echo '<script>console.log(' . $e->getMessage() . ')</script>';
            }
            // Consulta para el contenido de los manuales y crear "tarjetas" con cada registro
            try {
                include("../php/conexion.php");
                $consultaManual;
                if (isset($_POST['enviar'])){
                    $pagina=1;
                    $busqueda=$_POST['buscador'];
                    $consultaManual=crearConsulta($busqueda, $conexion, $pagina, $productosPorPagina);
                    $paginas=conteo($busqueda, $conexion, $pagina, $productosPorPagina);
                } else if(isset($_GET['filtro'])) {
                    $pagina=1;
                    $filtro=$_GET['filtro'];
                    $consultaManual=crearConsulta($filtro, $conexion, $pagina, $productosPorPagina);
                    $paginas=conteo($filtro, $conexion, $pagina, $productosPorPagina);
                } else if(isset($_GET['ordenar'])){
                    $pagina=1;
                    $orden=$_GET['ordenar'];
                    $consultaManual=crearConsultaOrden($orden, $conexion, $pagina, $productosPorPagina);
                    switch ($orden){
                        case 'ASC':
                            try {
                                include("../php/conexion.php");
                                $consultaConteo = $conexion->query("SELECT count(*) AS conteo FROM manuales ORDER BY titulo ASC");
                                $paginas=conteoOrden($paginas, $productosPorPagina, $consultaConteo);
                            } catch (PDOException $e) {
                                echo '<script>console.log(' . $e->getMessage() . ')</script>';
                            };
                        case 'DESC':
                            try {
                                include("../php/conexion.php");
                                $consultaConteo = $conexion->query("SELECT count(*) AS conteo FROM manuales ORDER BY titulo DESC");
                                $paginas=conteoOrden($paginas, $productosPorPagina, $consultaConteo);
                            } catch (PDOException $e) {
                                echo '<script>console.log(' . $e->getMessage() . ')</script>';
                            };
                    };
                } else {
                    $consultaManual = $conexion->prepare("SELECT * FROM manuales LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                };
                $consultaManual->execute();
                $resultado = $consultaManual->fetchAll();
                foreach ($resultado as $columna) {
                    echo '<section class="manual">
                            <img src="' . $columna['portada'] . '">
                            <section class="manual-texto">
                                <p id="p'.$columna['fichero'].'">' . $columna['titulo'] . '</p>
                                <button class="boton" id="'.$columna['fichero'].'">Descargar</button>
                            </section>
                        </section>';
                }
            } catch (PDOException $e) {
                echo '<script>console.log(' . $e->getMessage() . ')</script>';
            }
            function conteo($condicion, $conexion, $paginas, $productosPorPagina){
                try {
                    include("../php/conexion.php");
                    $consultaConteo = $conexion->query("SELECT count(*) AS conteo FROM manuales WHERE titulo LIKE '%$condicion%'");
                    $conteo = $consultaConteo->fetchObject()->conteo;
                    $paginas = ceil($conteo / $productosPorPagina);
                    return $paginas;
                } catch (PDOException $e) {
                    echo '<scrip?>console.log(' . $e->getMessage() . ')</script>';
                }
            };
            function crearConsulta($where, $conexion, $pagina, $productosPorPagina){
                $conteoManuales= $conexion->query("SELECT count(*) AS conteo FROM manuales WHERE titulo LIKE '%$where%'");
                $conteo = $conteoManuales->fetchObject()->conteo;
                if($conteo==false){
                    echo "<script>alert('No se encuentra ningun elemento: $where')</script>";
                    $consultaManual=$conexion->prepare("SELECT * FROM manuales LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                } else{
                    $consultaManual = $conexion->prepare("SELECT * FROM manuales WHERE titulo LIKE '%$where%' LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                };
                return $consultaManual;
            };
            function crearConsultaOrden($orden, $conexion, $pagina, $productosPorPagina){
                switch ($orden){
                    case 'ASC':
                        $consultaManual= $conexion->prepare("SELECT * FROM manuales  ORDER BY titulo '.$orden.' LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                        return $consultaManual;
                    case 'DESC':
                        $consultaManual= $conexion->prepare("SELECT * FROM manuales  ORDER BY titulo '.$orden.' LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                        return $consultaManual;
                };        
            };
            function conteoOrden($paginas, $productosPorPagina, $consultaConteo){
                    $conteo = $consultaConteo->fetchObject()->conteo;
                    $paginas = ceil($conteo / $productosPorPagina);
                    return $paginas; 
            };
            ?>
        </section>
        <div class="contenedor_final_pagina">
            <ul class="contenedor-a">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                <li>
                    <a href="./manuales.php?pagina=<?php echo $pagina - 1 ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                <li class="numero">
                    <a href="./manuales.php?pagina=<?php echo $x ?>">
                        <?php echo $x ?></a>
                </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                <li>
                    <a href="./manuales.php?pagina=<?php echo $pagina + 1 ?>">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </main>

    <footer class="pie">
        <div class="logos-footer container-footer">
            <img src="../img/logo_picofrentes.png" alt="Logo del Centro Pico Frentes" class="imagen-footer">
            <img src="../img/logo_fp.png" alt="Logo de Formarci&oacute;n profesional" class="imagen-footer">
        </div>

        <ul class="info-footer container-footer">
            <a href="mailto:email@email.com" target="_blank">
                <li>email@email.com</li>
            </a>
            <a href="tel:0034659659659" target="_blank">
                <li>659 659 659</li>
            </a>
            <a href="https://www.google.es/maps/place/Centro+Integrado+De+Formaci%C3%B3n+Profesional+Pic%C3%B3+Frentes/@41.7665028,-2.4843674,17z/data=!3m1!4b1!4m5!3m4!1s0xd44d2e709876957:0x469c9525026cc4ad!8m2!3d41.7664988!4d-2.4821734"
                target="_blank">
                <li>Calle Gervasio Manrique de Lara, 42004 Soria</li>
            </a>
        </ul>

        <div class="horario container-footer">
            <table class="tabla-horario">
                <tr>
                    <td>Lunes</td>
                    <td>10:00–15:00</td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td>10:00–14:05</td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td>Cerrado/Closed</td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td>10:00–14:05</td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td>10:00–14:05</td>
                </tr>
                <tr>
                    <td>Fin de semana</td>
                    <td>Cerrado/Closed</td>
                </tr>
            </table>
        </div>
    </footer>
</body>

</html>