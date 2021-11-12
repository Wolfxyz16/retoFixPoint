import {login} from '../js/login.js';
class inicioSesion{
    constructor(mail, contrasena) {
        this.mail = mail;
        this.contrasena = contrasena;
    }
  
    mailValidacion(x) {
        var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (x.length == 0 || x.length > 100 || pattern.test(x)) {
            return false
        } else {
            return true
        }
    }
    contrasenaValidacion(x) {
        if (x.length == 0 || x.length > 128) {
            return false
        } else {
            return true
        }
    }
    validarInicio(x) {
        if (x.mailValidacion(x.mail) && x.contrasenaValidacion(x.contrasena)) {
            return true
        } else {
            return false;
        }
    }
}
class registroSesion {
    constructor(mail, contrasena, nombre, apellido) {
        this.mail = mail;
        this.contrasena = contrasena;
        this.nombre = nombre;
        this.apellido = apellido;
    }


    mailValidacion(x) {
        var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (x.length == 0 || x.length > 100 || pattern.test(x)) {
            return false
        } else {
            return true
        }
    }

    contrasenaValidacion(x) {
        if (x.length == 0 || x.length > 128) {
            return false
        } else {
            return true
        }
    }

    nombreValidacion(x) {
        if (x.length == 0 || x.length > 25) {
            return false
        } else {
            return true
        }
    }

    apellidoValidacion(x) {
        if (x.length == 0 || x.length > 100) {
            return false
        } else {
            return true
        }
    }
    validarRegistro(x) {
        if (x.nombreValidacion(x.nombre) && x.apellidoValidacion(x.apellido) && x.mailValidacion(x.mail) && x.contrasenaValidacion(x.contrasena)) {
            return true;
        } else {
            return false;
        }
    }
}

function pintarError() {
    this.style.border = "solid red medium";
}

window.onload = function () {
    login();
    document.getElementById("iniciar-submit").onclick = function () {
        var loginValidacion = new inicioSesion(
            document.getElementById("iniciar-mail").value,
            document.getElementById("iniciar-contrasena").value
        );

        if (loginValidacion.validarInicio(loginValidacion)) {
            console.log('los campos estan completos')
        } else {
            document.getElementById("iniciar-mail").pintarError;
            document.getElementById("iniciar-contrasena").pintarError;
        }
    }

    document.getElementById("registrar-submit").onclick = function () {
        var signupValidacion = new registroSesion(
            document.getElementById("registrar-nombre").value,
            document.getElementById("registrar-apellido").value,
            document.getElementById("registrar-mail").value,
            document.getElementById("registrar-contrasena").value
        );

        if (signupValidacion.validarRegistro(signupValidacion)) {
            console.log('los campos estan completos')
        } else {
            document.getElementById("registrar-nombre").pintarError;
            document.getElementById("registrar-apellido").pintarError;
            document.getElementById("registrar-mail").pintarError;
            document.getElementById("registrar-contrasena").pintarError;
        }
    }
}