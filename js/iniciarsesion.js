const USER_TYPE =  document.getElementById('user-type');
const FORM = document. getElementById('FORM');
const FORM_REGISTRO = document.getElementById('FORM_REGISTRO');
var css = `
        footer {
              position: fixed;
              position:relative;
              bottom: 0;
        }
        @media (min-height:940px) {
            footer {
              position: fixed;
              bottom: 0;
              width: 100%;
            }
        }
        @media screen and (max-width: 925px){footer{position:relative; width:unset;}}
        @media screen and (max-height: 332px){footer{position:relative; width:unset;}}
        @media (max-height:924px) and (max-width:863px){footer{position:relative; width:unset;}}
        @media (min-height:925px) and (max-width: 925px){.DIV1{margin-button: 40px;} footer{position:fixed; width:unset;}}
        `;
var style = document.createElement('style');
style.innerHTML = css;
document.head.appendChild(style);

USER_TYPE.addEventListener("change", (event)=>{
    var css = `
        @media(max-height:925px){
          footer {
              position: unset;
              position: relative;
            }
        }
        
        @media screen and (max-width: 863px) {
            footer {
              position: relative;
            }
        }
        `;
    style.innerHTML = css;
    const OPTION_SELECT = event.target.value;
    if (OPTION_SELECT=== 'Alumno'){
        FORM.innerHTML=`
        <form action="iniciarsesion.php" method="POST">
            <h2>Iniciar sesion</h2>
            <label for="correo">Nombre de usuario:</label>
	        <input type="email" id="correo" name="correo" required>
	        <label for="contrasena" >Contraseña:</label>
	        <input type="password" id="contrasena" name="contrasena" required>
	        <input type="submit" value="Iniciar sesión">
        </form>
        <button onclick="OContraseña()"><span class="badge-O">¿Olvidaste tu contraseña?</span></button>
        <button onclick="registro()">¿No tienes cuenta? <span class="badge"> Da click aqui</span></button>
        `;
    }else if (OPTION_SELECT === 'Profesor'){
        FORM.innerHTML=`
        <form action="iniciarsesionP.php" method="POST">
            <h2>Iniciar sesion</h2>
            <label for="correo">Nombre de usuario:</label>
	        <input type="email" id="correo" name="correo" required>
	        <label for="contrasena">Contraseña:</label>
	        <input type="password" id="contrasena" name="contrasena" required>
	        <input type="submit" value="Iniciar sesión">
            <p>Si no tiene cuenta <span class="badge"> comunicate con nosotros!</span></p>
        </form>
        <button onclick="OContraseña()"><span class="badge-O">¿Olvidaste tu contraseña?</span></button>
        `;
    }
    
});



function registro(){
    FORM.innerHTML=`
    <form action="registrarse.php" method="POST" enctype="multipart/form-data">
		<h2>Registro de usuario</h2>
    <br>
    <center><h2>Tambien todos los datos que ingreses deben de ser reales ya que puedes tener problemas con tu cuenta. Todos tus datos estan seguros.</h2></center>
		<label for="nombre">Nombre del alumno:</label>
		<input type="text" id="nombre" name="nombre" pattern="{10,50}" title="Solo letras!" onkeyup="{this.value=this.value.toUpperCase();}"required>

		<label for="numero_control">Número de control:</label>
		<input type="text" id="numero_control" name="numero_control" maxlength="14" minlength="14" title="Solo Numeros y 14 caracteres!" pattern="[0-9]{14}" required>

		<label for="municipio">Municipio:</label>
		<input type="text" id="municipio" name="municipio" onkeyup="{this.value=this.value.toUpperCase();}" required>

		<label for="numero">Número de teléfono:</label>
		<input type="tel" id="numero" name="numero" maxlength="10" minlength="10" pattern="[0-9]{10}" title="Solo Numeros, solo 10 caracteres!" required>

		<label for="fecha_nacimiento">Fecha de nacimiento:</label>
		<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

		<label for="codigo_postal">Código postal:</label>
		<input type="text" id="codigo_postal" name="codigo_postal" title="Solo Numeros y maximo 5 numeros!" maxlength="5" minlength="5" pattern="[0-9]{5}" required>

		<label for="curp">CURP:</label>
		<input type="text" id="curp" name="curp" maxlength="16" pattern="[A-Z0-9]{16,16}" title="Solo mayusculas y letras, 16 caracteres" onkeyup="{this.value=this.value.toUpperCase();}" required>
    
    <label for="correo">Correo electrónico:</label>
		<input type="email" id="correo" name="correo" required>

    <br>
    <center><h2>Coloca una contraseña diferente a las que tienes vinculadas a tu correo</h2></center>
    <br>

		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena" pattern="{8,22}" maxlength="22" minlength="8" required>

    <label for="imagen">Foto:</label>
    <input type="file" id="imagen" name="imagen" required>

		<input type="submit" value="Registrarse">
	</form>
    `;
    
};

function OContraseña(){
    FORM.innerHTML=`
    <h1 class="OC">Olvidé mi contraseña</h1>
    <form id="password-recovery" method="POST" action="reset_password.php" id="forgot-password-form">
      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>
      <button type="submit">Restablecer contraseña</button>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    `;
};

function validarRegistro() {
  // Obtener los valores de los campos del formulario
  var nombre = document.getElementById("nombre").value.trim();
  var numero_control = document.getElementById("numero_control").value.trim();
  var municipio = document.getElementById("municipio").value.trim();
  var numero = document.getElementById("numero").value.trim();
  var fecha_nacimiento = document.getElementById("fecha_nacimiento").value.trim();
  var codigo_postal = document.getElementById("codigo_postal").value.trim();
  var curp = document.getElementById("curp").value.trim();
  var correo = document.getElementById("correo").value.trim();
  var correoo = document.getElementById("email").value.trim();
  var contrasena = document.getElementById("contrasena").value.trim();
  var imagen = document.getElementById("imagen").value.trim();
  var validacionC = validarCC(contrasena.value);

  // Validar que los campos no estén vacíos
  if (nombre === "" || numero_control === "" || municipio === "" || numero === "" || fecha_nacimiento === "" || codigo_postal === "" || curp === "" || correo === "" || contrasena === "" || imagen === "") {
    alert("Por favor, completa todos los campos.");
    return false;
  }

  // Validar el formato de los campos
  if (!nombre.match(/^[a-zA-Z ]+$/)) {
    alert("El nombre solo puede contener letras.");
    return false;
  }

  if (!numero_control.match(/^\d{14}$/)) {
    alert("El número de control debe contener 14 dígitos.");
    return false;
  }

  if (!municipio.match(/^[a-zA-Z ]+$/)) {
    alert("El municipio solo puede contener letras.");
    return false;
  }

  if (!numero.match(/^\d{10}$/)) {
    alert("El número de teléfono debe contener 10 dígitos.");
    return false;
  }

  if (!codigo_postal.match(/^\d{5}$/)) {
    alert("El código postal debe contener 5 dígitos.");
    return false;
  }

  if (!curp.match(/^[A-Z0-9]{16}$/)) {
    alert("La CURP debe contener 16 caracteres.");
    return false;
  }

  if (!correo.match(/^\S+@\S+\.\S+$/)) {
    alert("Por favor, introduce una dirección de correo electrónico válida.");
    return false;
  }

  if (!correoo.match(/^\S+@\S+\.\S+$/)) {
    alert("Por favor, introduce una dirección de correo electrónico válida.");
    return false;
  }

  if (!contrasena.match(/^.{8,22}$/)) {
    alert("La contraseña debe tener entre 8 y 22 caracteres.");
    return false;
  }
  function validarContrasena(contrasena) {
  var validacion = "El campo de contraseña es válido.";

  if (!contrasena.match(/^[a-zA-Z0-9.@ñ]{8,22}$/)) {
    validacion = "La contraseña debe tener entre 8 y 22 caracteres y solo puede contener números, letras, puntos y arrobas.";
  } else if (!contrasena.match(/[a-zA-Z]/)) {
    validacion = "La contraseña debe contener al menos una letra.";
  } else if (!contrasena.match(/[@.]/)) {
    validacion = "La contraseña debe contener al menos un punto o una arroba.";
  }

  return validacion;
}

  // Si todos los campos son válidos, enviar el formulario
  return true;
}
var formulario = document.getElementsByName('form');
formulario.addEventListener("submit", function(event) {
// Validar el formulario
if (!validarRegistro()) {
  event.preventDefault();
}});

