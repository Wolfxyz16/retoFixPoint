window.onload = function() {
    
    var select = document.getElementById("select-tabla");
    var formulario = document.getElementsByClassName("form");
    
    function recorrer(formulario , select) {
        for ( var i = 0 ; i < formulario.length ; i ++ ) {
            if ( formulario[i].classList.contains(select) ) {
                formulario[i].classList.remove("oculto");
                formulario[i].classList.add("visible");
            }
            else {
                formulario[i].classList.remove("visible");
                formulario[i].classList.add("oculto");
            }
        }
    }

    function cambiarFormulario() {
        let seleccion = select.value;

        switch (seleccion) {
            case "herramientas":
                recorrer(formulario , seleccion);
                break;
            case "manuales":
                recorrer(formulario , seleccion);
                break;
            case "usuarios":
                recorrer(formulario , seleccion);
                break;
            case "alquileres":
                recorrer(formulario , seleccion);
                break;
        }
    }
    
    select.onchange = cambiarFormulario;

}