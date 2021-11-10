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

//boton logearse
document.getElementById("iniciar-submit").onclick = function () {
    var loginValidacion = new validacion(
        document.getElementById("iniciar-mail"),
        documen.getElementById("iniciar-contrasena")
    );

    if (loginValidacion.validarInicio()) {
        console.log('login existoso')
    } else {
        loginValidacion.mail.pintarError;
        loginValidacion.contrasena.pintarError;
    }
}

document.getElementById("registrar-submit").onclick = function () {
    var signupValidacion = new validacion(
        document.getElementById("registrar-nombre"),
        documen.getElementById("registrar-apellido"),
        dcoument.getElementById("registrar-mail"),
        dcoument.getElementById("registrar-contrasena")
    );

    if (signupValidacion.validarRegistro()) {
        console.log('signup existoso')
    } else {
        loginValidacion.nombre.pintarError;
        loginValidacion.apellido.pintarError;
        loginValidacion.mail.pintarError;
        loginValidacion.contrasena.pintarError;
    }
}

function pintarError() {
    this.style.border = "solid red medium";
}