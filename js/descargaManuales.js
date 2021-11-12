function descarga (){
    var botones = document.getElementsByClassName("boton");
    for (let index = 0; index < botones.length; index++) {
        botones[index].addEventListener('click', descargarManual);
    };

    function descargarManual(event) {
        var element = document.createElement('a');
        element.href = event.target.id;
        var nombreFichero = document.getElementById("p"+event.target.id).textContent;
        console.log(nombreFichero);
        element.download=nombreFichero;
        element.dispatchEvent(new MouseEvent('click'));
    };
};
export{descarga};