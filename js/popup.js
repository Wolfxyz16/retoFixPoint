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

login.style.background="#F4EFDA"
formRegistro.style.display="none";
registrarse.style = ("background", "none");

function loginMostrar(){
  vaciar();
 formRegistro.style.display="none";
  formLogin.style.display="";
  registrarse.style = ("background", "none");
  login.style.background= "#F4EFDA";
};

function registroMostrar(){
  vaciar();
  formRegistro.style.display="";
  formLogin.style.display="none";
  login.style = ("background", "none");
  registrarse.style.background= "#F4EFDA"
};

function vaciar(){
  for(var i=0; i<input.length; i++){
    input[i].value="";
  }
};


//document.getElementById("btnR").addEventListener("submit", validarFormularioRegistro());

function validarFormularioRegistro() {

  var nombre=document.getElementById("nombre").value;
  if(nombre.length == 0) {
    alert('No ha escrito su nombre. Por favor rellene esta información para continuar.');
    return false;
  }
  var apellido=document.getElementById("apellido").value;
  if (apellido.length == 0) {
    alert('No ha escrito sus apellidos. Por favor rellene esta informaci&oacute;n para continuar.');
    return false;
  }
  var email=document.getElementById("email").value;
  if(email.length != 0) {
    pattern=/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (pattern.test(email)){
      
    } else{
        alert('El correo electronico insertaddo esta escrito de forma incorrecta. Escriba de forma correcta esta infomación para continuar');
        return false;
      }
    } else{
        alert('No ha escrito su email. Por favor rellene esta información para continuar.');
        return false;
    }
  var contrasena=document.getElementById("contrasena").value;
  if (contrasena.length == 0) {
    alert('No ha escrito su contrase&ntilde;a. Por favor rellene esta informaci&oacute;n para continuar.');
    return false;
  }
  return true;
}