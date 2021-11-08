import {slider} from './slider.js';
window.onload= function () {
    var items = document.getElementsByClassName('item');
    const sitios_web = ["../html/inicio.html", "../html/biblioteca.html", "../html/manuales.html", "../html/sobre_nosotros.html", "../html/popup.html"];
    for (let i = 0; i < sitios_web.length; i++) {
        items[i].addEventListener('click', function () {
            location.href = sitios_web[i];
        });
        
    };
    if(window.location.pathname == "/html/inicio.html"){
        slider();
    }
};

