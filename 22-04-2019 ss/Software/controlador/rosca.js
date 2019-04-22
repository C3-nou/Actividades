window.onload = iniciar;

function iniciar(){
    var proyectos = document.getElementById('proyect');
    var anadir = document.getElementById('sprintadd');
    var boton = document.getElementById('boto');

    anadir.style.display ="none";
    proyectos.style.display ="block";
    boton.style.display="block";
}

function addsprint(){
    var proyectos = document.getElementById('proyect');
    var añadir = document.getElementById('sprintadd');
    var boton = document.getElementById('boto');

    añadir.style.display ="block";
    proyectos.style.display ="none";
    boton.style.display="none";
}

function takanba(){
    var tablero = document.getElementById('oculkan');
    var tareanu = document.getElementById('añadirtarea');

    tablero.style.display ="none";
    tareanu.style.display ="block";
}

function documentaña(){
    var conte = document.getElementById('oculta');
    var subirdoc = document.getElementById('mostra');

    conte.style.display ="none";
    subirdoc.style.display ="block";
}