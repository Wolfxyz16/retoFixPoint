window.onload = function () {

    //herramientas-usuarios-manuales-alquileres
    var botones = document.getElementsByClassName["boton"];
    var tablas = document.getElementsByClassName["tabla"];
    
    function mostrarTabla() {
        for (var i = 0; i < botones.length; i++) {
            if (this == botones[i]) {
                document.getElementsByClassName["visible"].classList.add("hidden");
                tablas[i].classList.add("visible");
                return;
            }
        }
    }

    botones.onclick = mostrarTabla;

}