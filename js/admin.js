function administrador() {

    //herramientas-usuarios-manuales-alquileres
    var botones = document.getElementsByClassName("boton");
    var tablas = document.getElementsByClassName("tabla");
    for (let index = 0; index < botones.length; index++) {
        botones[index].addEventListener('click', mostrarTabla);
    }
    deshabilitarBotones(botones, "boton-herramientas");
    deshabilitarTablas(tablas, botones, "boton-herramientas");
    function mostrarTabla(event) {
        var id_boton = event.target.id;
        var botones = document.getElementsByClassName("boton");
        var tablas = document.getElementsByClassName("tabla");
        switch (id_boton) {
            case "boton-herramientas":;
                deshabilitarBotones(botones, id_boton);
                deshabilitarTablas(tablas, botones, id_boton);
                break;
            case "boton-usuarios":
                deshabilitarBotones(botones, id_boton);
                deshabilitarTablas(tablas, botones, id_boton);
                break;
            case "boton-manuales":
                deshabilitarBotones(botones, id_boton);
                deshabilitarTablas(tablas, botones, id_boton);
                break;
            case "boton-alquileres":
                deshabilitarBotones(botones, id_boton);
                deshabilitarTablas(tablas, botones, id_boton);
                break;
        }
    }
    function deshabilitarBotones(botones, id_boton) {
        for (let index = 0; index < botones.length; index++) {
            botones[index].disabled= "disabled"; 
        }
        document.getElementById(id_boton).disabled = true;
    }
    function deshabilitarTablas(tablas, botones, id_boton) {
        for (let index = 0; index < tablas.length; index++) {
            tablas[index].style.display= "none"; 
        }
        for (let index = 0; index < botones.length; index++) {
            if (botones[index].id==id_boton) {
                tablas[index].style.display= "table";
            }
            
        }
      
        
        
    }
};
export {administrador};