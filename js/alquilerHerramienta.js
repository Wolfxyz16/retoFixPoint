function alquiler () {
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
}
export {alquiler};