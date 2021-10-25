window.onload = function () {

    var slideIndex = 1;
    mostrarSlider();

    function mostrarSlider() {
        var i;
        var slides = document.getElementsByClassName("imagen-slider");

        for (i = 0; i < slides.length; i++)
            slides[i].style.display = "none";

        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1
        }

        slides[slideIndex - 1].style.display = "block";

        setTimeout(mostrarSlider, 2000);
    }

}