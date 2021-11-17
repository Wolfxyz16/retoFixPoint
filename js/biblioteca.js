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
    function alquilerHerramientas(event){
        var idHer=event.target.id;
        // Cogemos el modal
        var modal = document.getElementById("myModal");

        // Cogemos la "X" que cerrara el modal
        var span = document.getElementsByClassName("close")[0];

        // Abrir el modal
        modal.style.display = "block";
        

        // Cerrar el modal al hacer click en la "X"
        span.onclick = function() {
        modal.style.display = "none";
        location. href='../php/alquilerHerramientas.php?alquiler=true&id='+idHer;
        }

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