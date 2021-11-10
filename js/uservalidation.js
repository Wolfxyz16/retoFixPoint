class validacion {
    constructor(mail, contrasena) {
        this.mail = mail;
        this.contrasena = contrasena;
    }

    constructor(mail, contrasena, nombre, apellido) {
        this.mail = mail;
        this.contrasena = contrasena;
        this.nombre = nombre;
        this.apellido = apellido;
    }

    validarInicio() {
        if (this.mailValidacion(this.mail) || this.contrasenaValidacion(this.contrasena)) {
            return true
        } else {
            return false;
        }
    }

    validarRegistro() {
        if (this.nombreValidacion(this.nombre) || this.apellidoValidacion(this.apellido) || this.validarInicio()) {
            return true;
        } else {
            return false;
        }
    }

    mailValidacion(x) {
        var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (x.length = 0 || x.length > 100 || pattern.test(x)) {
            return false
        } else {
            return true
        }
    }

    contrasenaValidacion(x) {
        if (x.length = 0 || x.length > 128) {
            return false
        } else {
            return true
        }
    }

    nombreValidacion(x) {
        if (x.length = 0 || x.length > 25) {
            return false
        } else {
            return true
        }
    }

    apellidoValidacion(x) {
        if (x.length = 0 || x.length > 100) {
            return false
        } else {
            return true
        }
    }
}

function pintarError() {
    this.style.border = "solid red medium";
}

window.onload = function () {
    document.getElementById("iniciar-submit").onclick = function () {
        var loginValidacion = new validacion(
            document.getElementById("iniciar-mail").value,
            documen.getElementById("iniciar-contrasena").value
        );

        if (loginValidacion.validarInicio()) {
            console.log('login existoso')
        } else {
            document.getElementById("iniciar-mail").pintarError;
            documen.getElementById("iniciar-contrasena").pintarError;
        }
    }

    document.getElementById("registrar-submit").onclick = function () {
        var signupValidacion = new validacion(
            document.getElementById("registrar-nombre").value,
            documen.getElementById("registrar-apellido").value,
            dcoument.getElementById("registrar-mail").value,
            dcoument.getElementById("registrar-contrasena").value
        );

        if (signupValidacion.validarRegistro()) {
            console.log('signup existoso')
        } else {
            document.getElementById("registrar-nombre").pintarError;
            documen.getElementById("registrar-apellido").pintarError;
            dcoument.getElementById("registrar-mail").pintarError;
            dcoument.getElementById("registrar-contrasena").pintarError;
        }
    }
}