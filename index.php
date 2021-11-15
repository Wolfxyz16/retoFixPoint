<!-- Esta pagina la hizo Yeray -->
<?php
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/inicio.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="icon" type="image/png" href="img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <script type="module" src="../js/menu.js"></script>

    <title>Fix Point-P&aacute;gina principal</title>

</head>

<body>
    <header>
        <div class="cabecera">
            <section class="contenedor-logo" id="contenedor-logo-fixpoint">
                <a href="html/inicio.html"><img src="img/logo_fixpoint_grisoso.png" alt="logo fixpoint"
                        id="logo-fixpoint"></a>
            </section>
            <div class="menu">
                <div class="item"><span><img src="img/logo_fixpoint_simple.png" id="logo_redireccion_inicio"></span></div>
                <div class="item"><span>Biblioteca</span></div>
                <div class="item"><span>Manuales</span></div>
                <div class="item"><span>Sobre Nosotros</span></div>
                <?php
                    session_start();
                    if(isset( $_SESSION['usuario']) ) {
                        if ($_SESSION['admin']==true) {
                            print '<div class="item" id="admin"><span>Administrador</span></div>';
                        }else{
                             print '<div class="item" id="usuario"><span>' . $_SESSION['usuario'] . '</span></div>';
                        }
                    } else {
                        print '<div class="item" id="iniciosesion"><span>Inicio Sesion/Registro</span></div>';
                    }
                    
                ?>
                <div id="label"><span class="hamburger"></span></div>
              </div>
        </div>
    </header>

        <div class="slider">
            <div class="imagen-slider">
                <img src="img/slider/1.jpg" alt="primera foto slider">
            </div>
            <div class="imagen-slider">
                <img src="img/slider/2.jpg" alt="segunda foto slider">
            </div>
            <div class="imagen-slider">
                <img src="img/slider/3.jpg" alt="tercera foto slider">
            </div>
        </div>
    </header>

    <main class="cuerpo">

        <article class="accesos">
            <section class="biblioteca caja">
                <a href="biblioteca.html">
                    <img src="img/bibliotecatest.png" alt="Imagen biblioteca">
                    <section class="caja-texto">
                        <h2>Biblioteca</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt earum dignissimos rem
                            incidunt fugiat consectetur labore, consequuntur molestias aspernatur officia velit,
                            voluptatem, culpa repellendus excepturi.</p>
                    </section>
                </a>
            </section>


            <section class="manuales caja">
                <a href="manuales.html">
                    <img src="img/bibliotecatest.png" alt="Imagen manuales">
                    <section class="caja-texto">
                        <h2>Manuales</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos expedita ullam quis! Molestiae
                            a autem necessitatibus ex eaque facere atque iusto delectus, ut tempore sapiente.</p>
                    </section>
                </a>
            </section>


            <section class="sobrenosotros caja">
                <a href="sobre_nosotros.html">
                    <img src="img/bibliotecatest.png" alt="Imagen sobre nosotros">
                    <section class="caja-texto">
                        <h2>Sobre Nosotros</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora praesentium similique ipsa
                            facere quasi iure fugiat, necessitatibus odio impedit placeat dolores, itaque quaerat ut
                            soluta!</p>
                    </section>
                </a>
            </section>
        </article>

    </main>

    <footer class="pie">
        <div class="logos-footer container-footer">
            <img src="img/logo_picofrentes.png" alt="Logo del Centro Pico Frentes" class="imagen-footer">
            <img src="img/logo_fp.png" alt="Logo de Formarci&oacute;n profesional" class="imagen-footer">
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