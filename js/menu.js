import {slider} from './slider.js';
import {administrador} from './admin.js';
import {descarga} from './descargaManuales.js';
import{alquiler} from './alquilerHerramienta.js';
window.onload= function () {

    var items = document.getElementsByClassName('item');
    const sitios_web = ["../index.php", "../html/biblioteca.php", "../html/manuales.php", "../html/sobre_nosotros.html"];
    
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
    if(document.getElementById('admin')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
            location.href = "../html/admin.php";
        });
    }else if(document.getElementById('usuario')){
        document.getElementById('iniciosesion').addEventListener('click', function () {  
            location.href = "../index.php";
            sessionStorage.removeItem('usuario');
        });
    }else if(document.getElementById('iniciosesion')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
            location.href = "../html/login.html";
        });
    }

    if(window.location.pathname.indexOf("/index.php") >-1){
        slider();
    }
    if (window.location.pathname.indexOf("/html/admin.php") >-1 ){

        administrador();
    }
    if (window.location.pathname.indexOf("/html/manuales.php") >-1 ){
       
        descarga();
    }
    if (window.location.pathname.indexOf("/html/biblioteca.php") >-1 ){
        alquiler();
    }
};

