window.onload = function() {

    var login_boton = document.getElementById("iniciar-boton");
    var singup_boton = document.getElementById("registrar-boton");
    
    var iniciar = document.getElementById("iniciar-formulario");
    var registrar = document.getElementById("registrar-formulario");

    login_boton.onclick = function() {
        registrar.style.display = "none";
        iniciar.style.display = "block";
    };
    
    singup_boton.onclick = function() {
        iniciar.style.display = "none";
        registrar.style.display = "block";
    };
}