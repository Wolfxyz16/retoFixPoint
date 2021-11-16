import {slider} from './slider.js';
import {administrador} from './admin.js';
import {manuales} from './manuales.js';
import {accesoDesdeIndex} from './accesoDesdeIndex.js';
import {accesoDesdeHtml} from './accesoDesdeHtml.js';
import{biblioteca} from './biblioteca.js';

window.onload= function () {
    console.log(window.location.pathname.indexOf("/html/"));
    if (window.location.pathname.indexOf("/html/") >-1){
       accesoDesdeHtml();
    }else{
       accesoDesdeIndex();
    }
    
    if (window.location.pathname.indexOf("/html/admin.php") >-1 ){
        administrador();
    }
    else if (window.location.pathname.indexOf("/html/manuales.php") >-1 ){
        manuales();
    }
    else if (window.location.pathname.indexOf("/html/biblioteca.php") >-1 ){

        biblioteca();
    }else if(window.location.pathname.indexOf("/html/sobre_nosotros.php")<=-1){
        slider();
    }
};

