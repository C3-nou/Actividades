window.onload = iniciar;

function iniciar(){
	document.getElementsByName("registro")[0].addEventListener('click',validar);
}


function validar(e){


	borrarError();

	if(validaNombre() && validaApellido() && validaUsuario() && validaCorreo() && validaContrasena()){

		alert("Todo correcto");

	}else{
		
		e.preventDefault();
		return false;

	}
}

function validaNombre(){
	var nombre = document.getElementById("nombres");
	if(validaCamposNulos(nombre) && Contador(nombre) && soloLetras(nombre)){
		return true;
	}else{
		//Errores(nombre);
		return false;
	}

}

function validaApellido(){
	var apellido = document.getElementById("apellidos");
	if(validaCamposNulos(apellido) && Contador(apellido) && soloLetras(apellido)){
		return true;
	}else{
		return false;
	}
}

function validaUsuario(){
	var usuario = document.getElementById("usuarios");
	if(validaCamposNulos(usuario) && Contador(usuario) && validarUsuarioyContrasena(usuario)){
		return true;
	}else{
		return false;
	}
}

function validaCorreo(){
	var correo = document.getElementById("correos");
	if(validaCamposNulos(correo) && Contador(correo) && validarCorreo(correo)){
		return true;
	}else{
		return false;
	}
}

function validaContrasena(){
	var contrasena = document.getElementById("password");
	if(validaCamposNulos(contrasena) && Contador(contrasena) && validarUsuarioyContrasena(contrasena)){
		return true;
	}else{
		return false;
	}
}

function Contador(variable){
	if(variable.value.length > 20){
		Errores(variable, mensaje = "contador");
		return false;
	}else{
		variable.className = "";
		return true;
	}
}

function soloLetras(variable){
	var metadato = /[A-Za-zÀ-ÿ\u00f1\u00d1+\s+a-zÀ-ÿ\u00f1\u00d1|A-Za-zÀ-ÿ\u00f1\u00d1]+$/;
	if(metadato.test(variable.value)){
		variable.className = "";
		return true;
	}else{
		Errores(variable, mensaje = "letras");
		return false;
	}
}

function validarCorreo(variable){
	var metadato = /\w+@\w+\.+[a-z]+$/;
	if(metadato.test(variable.value)){
		variable.className = "";
		return true;
	}else{
		Errores(variable, mensaje = "correo");
		return false;
	}
}

function validarUsuarioyContrasena(variable){
	var metadato = /[\w]+$/;
	if(metadato.test(variable.value)){
		variable.className = "";
		return true;
	}else{
		Errores(variable, mensaje = "usuario");
		return false;
	}
}

function validaCamposNulos(variable){
	if(variable != null && variable.value.length > 0){
		variable.className = "";
		return true;
	}else{
		Errores(variable, mensaje = "nulos");
		return false;
	}
}

function Errores(variable, mensaje){
	switch (mensaje) {
		case 'nulos':
			document.getElementById("mensaje").innerHTML = "<p>Este campo se encuenta vacío.</p>";
			variable.className = "error";
			variable.focus();
			break;
		case 'contador':
			document.getElementById("mensaje").innerHTML = "<p>La cantidad de caracteres debe ser menor a 20.</p>";
			variable.className = "error";
			variable.focus();
			break;
		case 'letras':
			document.getElementById("mensaje").innerHTML = "<p>Este campo solo recibe letras.</p>";
			variable.className = "error";
			variable.focus();
			break;
		case 'correo':
			document.getElementById("mensaje").innerHTML = "<p>Este correo no es valido.</p>";
			variable.className = "error";
			variable.focus();
			break;
		case 'usuario':
			document.getElementById("mensaje").innerHTML = "<p>Este campo solo permite caracteres alfanuméricos.</p>";
			variable.className = "error";
			variable.focus();
			break;
		default:
			variable.className = "error";
			variable.focus();	
			break;
	}
}

function borrarError(){
	document.getElementById("mensaje").innerHTML = "";
}
