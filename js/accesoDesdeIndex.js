function accesoDesdeIndex() {
    var items = document.getElementsByClassName('item');
    var sitios_web = ["", "html/biblioteca.php", "html/manuales.php", "html/sobre_nosotros.php"];
    if(document.getElementById('admin')){
        document.getElementById('modo-admin').addEventListener('click', function () {
            location.href = location.href+"/html/admin.php";
        });
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            sessionStorage.removeItem('usuario');
            location.href = "";
        });
    }else if(document.getElementById('usuario')){
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            sessionStorage.removeItem('usuario');
            location.href = "";
        });
    }else if(document.getElementById('iniciosesion')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
                location.href = "html/biblioteca.php";
        });
    }
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
};
export {accesoDesdeIndex};