function biblioteca () {
    if(localStorage.getItem('url_biblioteca')===null){
        localStorage.setItem('url_biblioteca', location.href);
    }
    var biblioteca=localStorage.getItem('url_biblioteca');
    console.log(biblioteca);
  
    console.log( location.href);
    var botones = document.getElementsByClassName("buton");
    for (let index = 0; index < botones.length; index++) {
        botones[index].addEventListener('click', alquilerHerramientas);
    };
    //Esta funcion ejecutara la funcionalidad que cambia el estado de la disponibilidad de las herramientas y posteriormente se hara una inserccion en la tabla de alquiler
    function alquilerHerramientas(event){
        //Creamos la variable que guardara la id de las herramientas. Variable necesaria para la inserccion en  la tabla de alquiler.
        var idHer=event.target.id;
        // Cogemos el modal
        var modal = document.getElementById("myModal");

        // Cogemos elementos que cerraran el modal
        var elementoCerrar = document.getElementsByClassName("close");
        //Creamos el evento click que cerrara el modal
        for(var i=0; i<elementoCerrar.length; i++) {
            elementoCerrar[i].addEventListener('click', function (){
                //quitando el display cerramos el modal
                modal.style.display = "none";
            });
        };

        // Abrir el modal
        modal.style.display = "block";

        //En el boton que muestra un si en el modal creamos un evento click que redireccioana a un php que manejara las ordenes relacionadas con la base de datos
        document.getElementById("modal_btn_si").onclick = function() {
            modal.style.display = "none";
            location. href='../php/alquilerHerramientas.php?alquiler=true&id='+idHer;
        };
    }
    
    var filtro=document.getElementById("tipo_herramienta");
    filtro.addEventListener('change', function (){
        location.href=biblioteca+'?filtro='+filtro.value;
    });

    var filtroOrden=document.getElementById("orden");
    filtroOrden.addEventListener('change', function (){
        location.href=biblioteca+'?ordenar='+filtroOrden.value;
    });

    var imagenes=document.getElementsByClassName("img_her");
    for (let index = 0; index < imagenes.length; index++) {
        imagenes[index].width=195;
        imagenes[index].height=146;
    };
};

    
    

export {biblioteca};