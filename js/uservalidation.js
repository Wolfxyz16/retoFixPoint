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
document.getElementById('btnL').onclick = function () {
    var loginValidacion = new validacion(
        document.getElementById('login-email'),
        documen.getElementById('login-password')
    );

    if (loginValidacion.validarInicio()) {
        console.log('login existoso')
    } else {
        console.log('login fallido');
    }
}

document.getElementById('btnR').onclick = function () {
    var signupValidacion = new validacion(
        document.getElementById('signup-email'),
        documen.getElementById('signup-password'),
        dcoument.getElementById('signup-name'),
        dcoument.getElementById('signup-surname')
    );

    if (signupValidacion.validarRegistro()) {
        console.log('signup existoso')
    } else {
        console.log('signup fallido');
    }
}