function accesoDesdeHtml() {
    var items = document.getElementsByClassName('item');
    var sitios_web = ["../", "biblioteca.php", "manuales.php", "sobre_nosotros.php"];
    document.getElementById("a-logo-fixpoint").href="../";
    document.getElementById("logo-fixpoint").src= "../img/logo_fixpoint_grisoso.png";
    document.getElementById("logo_redireccion_inicio").src="../img/logo_fixpoint_simple.png";
    if(document.getElementById('admin')){
        document.getElementById('modo-admin').addEventListener('click', function () {
            location.href = "admin.php";
        });
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            location.href = "../php/cerrarSesion.php";
        });
    }else if(document.getElementById('usuario')){
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            sessionStorage.removeItem('usuario');
            location.href = "../php/cerrarSesion.php";
        });
    }else if(document.getElementById('iniciosesion')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
            location.href = "login.html";
        });
    }
    for (let i = 0; i < items.length-1; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
};
export {accesoDesdeHtml};