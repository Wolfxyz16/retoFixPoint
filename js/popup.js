// Get the modal
var modal = document.getElementById("myModal");
                
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
modal.style.display = "block";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  history.go(-1);
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    history.go(-1);
  }
}
var formLogin=document.getElementById("login-form");
var login=document.getElementById("login");
var formRegistro=document.getElementById("signup-form");
var registrarse=document.getElementById("signup");
var boton=document.getElementById("btn");
var input=document.getElementsByClassName("input");

formLogin.style.display="none";
login.style = ("background", "none");

function loginMostrar(){
 formRegistro.style.display="none";
  formLogin.style.display="";
  registrarse.style = ("background", "none");
  login.style=("background", "#fff");
};

function registroMostrar(){
  formRegistro.style.display="";
  formLogin.style.display="none";
  login.style = ("background", "none");
  registrarse.style=("background", "#fff");
};

function vaciar(){
  for(var i=0; i<input.length; i++){
    input[i].value="";
  }
};