import {slider} from './slider.js';
import {administrador} from './admin.js';
import {descarga} from './descargaManuales.js';
<<<<<<< HEAD
import{alquiler} from './alquilerHerramienta.js';
=======
import {alquiler} from './alquilerHerramienta.js';
>>>>>>> 036948e884390d7e1fdeddfaa36116cd9af0e322
window.onload= function () {

    var items = document.getElementsByClassName('item');
    const sitios_web = ["../html/inicio.php", "../html/biblioteca.php", "../html/manuales.php", "../html/sobre_nosotros.html"];
    
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
            location.href = "../html/inicio.php";
            sessionStorage.removeItem('usuario');
        });
    }else if(document.getElementById('iniciosesion')){
        document.getElementById('iniciosesion').addEventListener('click', function () {
            location.href = "../html/login.html";
        });
    }

    if(window.location.pathname.indexOf("/html/inicio.php") >-1){
        slider();
    }
    if (window.location.pathname.indexOf("/html/admin.php") >-1 ){

        administrador();
    }
    if (window.location.pathname.indexOf("/html/manuales.php") >-1 ){
       
        descarga();
    }
<<<<<<< HEAD
    if (window.location.pathname.indexOf("/html/biblioteca.php") >-1 ){
=======
    if (window.location.pathname.indexOf("/html/biblioteca.php") >-1) {
>>>>>>> 036948e884390d7e1fdeddfaa36116cd9af0e322
        alquiler();
    }
};

