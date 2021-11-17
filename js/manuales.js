function manuales (){
    if(localStorage.getItem('url_manuales')===null){
        localStorage.setItem('url_manuales', location.href);
    }
    var manuales=localStorage.getItem('url_manuales');
  
    var botones = document.getElementsByClassName("boton");
    for (let index = 0; index < botones.length; index++) {
        botones[index].addEventListener('click', descargarManual);
        botones[index].style.marginRight = 0;
        botones[index].style.backgroundColor = '#EEC51F'
    };

    function descargarManual(event) {
        var element = document.createElement('a');
        element.href = event.target.id;
        var nombreFichero = document.getElementById("p"+event.target.id).textContent;
        console.log(nombreFichero);
        element.download=nombreFichero;
        element.dispatchEvent(new MouseEvent('click'));
    };

    var filtro=document.getElementById("tipo_manual");
    filtro.addEventListener('change', function (){
        location.href=manuales+'?filtro='+filtro.value;
    });

    var filtroOrden=document.getElementById("orden");
    filtroOrden.addEventListener('change', function (){
        location.href=manuales+'?ordenar='+filtroOrden.value;
    });
};
export{manuales};