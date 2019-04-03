function mq() {

    $(".fot").hide(1000);
    $(".quie").show(1000);
    $(".cont").hide(1000);
}
;
function mc() {

    $(".fot").hide(1000);
    $(".quie").hide(1000);
    $(".cont").show(1000);
}
;
//estas es la opcion de ocultar y mostrar contenido del index2(guia,crear y ver proyectos)


function  boton() {

    $("#crearPro").hide(1000);
    $("#proyectos").hide(1000);
    $("#guia").show(1000);

}
;

function crearProbtn() {

    $("#openModalpro").show(1000);
}
;
function editarperil() {

    $("#openModalpro").show(1000);
}
;

function proyectosbtn() {
    $("#openModalpro").hide(1000);
    $("#guia").hide(1000);
    $("#proyectos").show(1000);
}
;

//estas son las opciones para ocultar y mostrar contenido del modal de index_pro(crear proyecto,miembros y planificacion)
function modalcrearPro() {
    $("#miembros").hide(1000);
    $("#planificacion").hide(1000);
    $("#crearpro").show(1000);
}
;

function modalmiembros() {
    $("#crearpro").hide(1000);
    $("#planificacion").hide(1000);
    $("#miembros").show(1000);
}
;

function modalplanificacion() {
    $("#crearpro").hide(1000);
    $("#miembros").hide(1000);
    $("#planificacion").show(1000);
}
;

//propiedades boton cerrar
function cancelar() {
$(location).attr('href', 'index2.php'); 
}


/** 
MODAL MODIFI*/
function mq() {

    $(".fot").hide(1000);
    $(".quie").show(1000);
    $(".cont").hide(1000);

}
;
function mc() {

    $(".fot").hide(1000);
    $(".quie").hide(1000);
    $(".cont").show(1000);
}
;
function  boton() {

    $("#crearPromodi").hide(1000);
    $("#proyectos").hide(1000);
    $("#guia").show(1000);

}
;

function crearProbtnmodifi() {

    $("#openModalmodifi").show(1000);
}
;


//estas son las opciones para ocultar y mostrar contenido del modal de index_pro(crear proyecto,miembros y planificacion)
function modalcrearPromodifi() {
    $("#miembrosmodifi").hide(1000);
    $("#crearpromodi").show(1000);
}
;

function modalmiembrosmodifi() {
    $("#crearpromodi").hide(1000);
    $("#miembrosmodifi").show(1000);
}
;

//propiedades boton cerrar
function cancelar() {
$(location).attr('href', 'index2.php'); 
}