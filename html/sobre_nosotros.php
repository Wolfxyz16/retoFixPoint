<!-- Esta pagina la hizo Ekaitz -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/boton.css">
    <link rel="stylesheet" href="../styles/sobre_nosotros.css">
    
    <script type="module" src="../js/menu.js"></script>

    <link rel="icon" type="image/png" href="../img/logo_fixpoint_simple.png" sizes="16x16 24x24 36x36 48x48">
    <title>Sobre Nosotros</title>
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

        <div id="que-es">
            <h1 id="pregunta-titulo">??Que es una biblioteca de herramientas?</h1>
            <div id="que-es-contenido">
                <p>
                    FixPoint es la primera Biblioteca de pr??stamo de Espa??a. Las Bibliotecas de herramientas funcionan
                    como cualquier otra Biblioteca. Te conviertes en miembro y luego puedes tomar prestadas
                    herramientas. No tenemos fines de lucro y buscamos ser una organizaci??n ben??fica. Los objetivos son
                    simples:
                </p>
                <ul>
                    <li>
                        Promover las habilidades de bricolaje, fabricaci??n y reparaci??n mediante el intercambio de
                        herramientas
                    </li>
                    <li>
                        Hacer de Soria una ciudad m??s sostenible
                    </li>
                    <li>
                        Crear oportunidades de aprendizaje y desarrollo
                    </li>
                </ul>
            </div>
            <img src="../img/acercade.jpg" alt="biblioteca">
        </div>

        <div class="img_con_texto">
            <img src="../img/acercade.jpg" alt="vision">
            <div class="mensaje">
                <h1 class="titulo">Visi??n</h1>
                <p class="texto">
                    FixPoint es un proyecto que lucha por una econom&iacute;a circular. Esto significa que creemos en un
                    sistema cerrado de materias primas, en el que los productores seguir&aacute;n siendo los
                    propietarios
                    de las materias primas contenidas en los productos en el futuro. Para lograr esto, embargo,
                    debemos facilitar que 'acceder a' sea m&aacute;s f&aacute;cil, m&aacute;s barato y m??s divertido que
                    'poseer'.
                </p>
            </div>
        </div>

        <div class="img_con_texto">
            <img src="../img/objetivo.jpg" alt="objetivo">
            <div class="mensaje">
                <h1 class="titulo">Objetivo</h1>
                <p class="texto">
                    La Biblioteca de herramientas FixPoint, quiere provocar un cambio en el de sobreproducci&oacute;n e
                    ineficiencia resultante, la comunicaci??n la desigualdad (social). La misi??n de FixPoint es
                    transformar la mentalidad social, en la que la propiedad se elige sobre el acceso. Queremos
                    servir de inspiraci&oacute;n para abrir una Biblioteca FixPoint en sus vecindarios acceso para todo
                    el
                    mundo.
                </p>
            </div>
        </div>

        <form id="formulario-entero" method="post" action="../php/sobrenosotros.php">
            <fieldset id="formulario-datos">
                <legend>Contacto</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <!-- <label for="apellidos">Apellidos</label>
                <input type="text" name="apellido"> -->
                <!-- ??quitamos los apellidos? es un poco redundante que alquien tenga que escribir sus ape para consultar algo -->
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" rows="5" cols="22"></textarea>
                <input type="submit" id="Enviar" class="boton">
            </fieldset>
        </form>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2975.8682280791436!2d-2.484362084562394!3d41.766498779231206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd44d2e709876957%3A0x469c9525026cc4ad!2sCentro%20Integrado%20De%20Formaci%C3%B3n%20Profesional%20Pic%C3%B3%20Frentes!5e0!3m2!1ses!2ses!4v1634292876084!5m2!1ses!2ses"
            allowfullscreen loading="lazy">
        </iframe>


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
                    <td>10:00???15:00</td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td>10:00???14:05</td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td>Cerrado/Closed</td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td>10:00???14:05</td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td>10:00???14:05</td>
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