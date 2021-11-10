class Validacion {
    constructor(){
        this.nombre = document.getElementByName("nombre").value;
        this.mail = document.getElementByName("email").value;
        this.mensaje = document.getElementByName("mensaje").value;
    }

    constructor( nombre , mail , mensaje ){
        this.nombre = nombre;
        this.mail = mail;
        this.mensaje = mensaje;
    }

    validarNombre() {
        if (this.nombre > 0 && this.nombre < 50 ) { return true; }
        else { return false; }
    }

    validarMail() {
        var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (pattern.test(this.mail) && this.mail > 0 ) { return true; }
        else { return false; }
    }

    validarMensaje() {
        if ( this.mensaje > 0 && this.mensaje < 255 ) { return true; }
        else { return false; }
    }

    validarFormulario() {
        if ( this.validarNombre && this.validarMail && this.validarMensaje ) { return true; }
        else { return false; }
    }
}

window.onload = function() {
    var validacion = new Validacion();
    validacion.validarFormulario;
}