import {slider} from './slider.js';
import {administrador} from './admin.js';
window.onload= function () {

    var items = document.getElementsByClassName('item');
    const sitios_web = ["../html/inicio.html", "../html/biblioteca.html", "../html/manuales.html", "../html/sobre_nosotros.html", "../html/login.html"];
    for (let i = 0; i < sitios_web.length; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
    if(window.location.pathname.indexOf("/html/inicio.html") >-1){
        slider();
    }
    if (window.location.pathname.indexOf("/html/admin.php") >-1 ){

        administrador();
    }
};

