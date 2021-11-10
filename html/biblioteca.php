<!-- Esta pagina la hizo Shania -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/header.css" type="text/css">
    <link rel="stylesheet" href="../styles/footer.css" type="text/css">
    <link rel="stylesheet" href="../styles/boton.css">
    <link rel="icon" type="image/png" href="../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Biblioteca</title>
    <script  type="module" src="../js/menu.js"></script>
</head>

<body>

    <header>
        <div class="cabecera">
            <section class="contenedor-logo" id="contenedor-logo-fixpoint">
                <a href="../html/inicio.html"><img src="../img/logo_fixpoint_grisoso.png" alt="logo fixpoint"
                        id="logo-fixpoint"></a>
            </section>
            <div class="menu">
                <div class="item"><span><img src="../img/logo_fixpoint_simple.png" id="logo_redireccion_inicio"></span></div>
                <div class="item"><span>Biblioteca</span></div>
                <div class="item"><span>Manuales</span></div>
                <div class="item"><span>Sobre Nosotros</span></div>
                <div class="item"><span>Inicio Sesion/Registro</span></div>
                <div id="label"><span class="hamburger"></span></div>
              </div>
        </div>
    </header>

    <main>
        <div class="contenedor-uno">
            <div class="contenedor-uno-linea">
                <h1>Biblioteca de herramientas</h1>
                <div class="contenedor_buscar">
                    <input class="buscador" type="search" name="buscador" placeholder="B&uacute;squeda...">
                    <button id="buscar_boton" class="boton" type="submit" >Buscar</button>
                </div>
            </div>

            <div class="contenedor-uno-linea">
                <select class="tipos_herramientas">
                    <option value="" selected>Todas las herramientas</option>
                    <option>Martillo martilleador</option>
                    <option>Martillo golpeante</option>
                    <option>Martillo hidra&uacute;lico</option>
                    <option>Martillo fulgurante</option>
                    <option>Martillo fugaz</option>
                    <option>Martillo destructor</option>
                    <option>Martillo constructor</option>
                    <option>Martillo ensamblador</option>
                    <option>Martillo destornillante</option>
                </select>
                <div class="ordenar_por">
                    <label>Ordenar por</label>
                    <select class="A-Z">
                        <option value="az">A - Z</option>
                        <option value="za">Z - A</option>
                        <option value="disponible">Disponible</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="herramientas">
        <?php
            // Cuántos productos mostrar por página
            $productosPorPagina = 16;
            // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
            $pagina = 1;
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            }
            // Necesitamos el conteo para saber cuántas páginas vamos a mostrar
            try {
                include("../php/conexion.php");
                $consultaConteo = $conexion->query("SELECT count(*) AS conteo FROM herramientas");
                $conteo = $consultaConteo->fetchObject()->conteo;
                $paginas = ceil($conteo / $productosPorPagina);
            } catch (PDOException $e) {
                echo '<script>console.log(' . $e->getMessage() . ')</script>';
            }
            // Consulta para el contenido de los manuales y crear "tarjetas" con cada registro
            try {
                include("../php/conexion.php");
                $consultaManual = $conexion->prepare("SELECT * FROM herramientas LIMIT " . (($pagina - 1) * $productosPorPagina)  . "," . $productosPorPagina);
                $consultaManual->execute();
                $resultado = $consultaManual->fetchAll();
                foreach ($resultado as $columna) {
                    echo '<div class="her">
                            <div class="img">
                            <img src="' . $columna['foto'] . '">
                            </div>
                            <div class="info">
                                <p>' . $columna['nombre'] . '<br>
                                '.$columna['marca_y_modelo'].'</p>
                            </div>
                            <div class="alquiler">';
                                 if ($columna['disponibilidad']=="Disponible") {
                                    echo '<p style="background-color: green";>Disponible</p>
                                    <button class="boton" id="alquilar">Alquilar ahora</button>';
                                } else {
                                    echo '<p style="background-color: red";>No disponible</p>';
                                };
                            echo '</div>
                            </div>';
                }
            } catch (PDOException $e) {
                echo '<script>console.log(' . $e->getMessage() . ')</script>';
            }
            ?>
        </div>
        <div class="contenedor_final_pagina">
        <ul class="contenedor-a">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./biblioteca.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="numero">
                        <a href="./biblioteca.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./biblioteca.php?pagina=<?php echo $pagina + 1 ?>">
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