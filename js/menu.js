import {slider} from './slider.js';
import {administrador} from './admin.js';
import {descarga} from './descargaManuales.js';
import{biblioteca} from './biblioteca.js';
window.onload= function () {

    var items = document.getElementsByClassName('item');
    const sitios_web = ["", "html/biblioteca.php", "html/manuales.php", "html/sobre_nosotros.php"];
    
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
    if(document.getElementById('admin')){
        document.getElementById('modo-admin').addEventListener('click', function () {
            location.href = "../html/admin.php";
        });
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            location.href = "../html/inicio.php";
            sessionStorage.removeItem('usuario');
        });
    }else if(document.getElementById('usuario')){
        document.getElementById('cerrar-sesion').addEventListener('click', function () {
            location.href = "../html/inicio.php";
            sessionStorage.removeItem('usuario');
        });
    }else if(document.getElementById('iniciosesion')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
            location.href = "../html/login.html";
        });
    }

    
    if (window.location.pathname.indexOf("/html/admin.php") >-1 ){

        administrador();
    }
    else if (window.location.pathname.indexOf("/html/manuales.php") >-1 ){
       
        descarga();
    }
    else if (window.location.pathname.indexOf("/html/biblioteca.php") >-1 ){
        biblioteca();
    }else if(window.location.pathname.indexOf("") >-1){
        slider();
    }
};

