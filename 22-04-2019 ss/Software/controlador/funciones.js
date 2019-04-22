function deleteProyecto(id){
    if(confirm('¿Deseas eliminar tu proyecto?')){
        window.location.href = '../controlador/controladorPrincipal.php?eliminar='+id+"";
        return true;
    }
}

function finalizarProyecto(id){
    if(confirm('¿Deseas finalizar tu proyecto?')){
        window.location.href = '../controlador/controladorPrincipal.php?finalizar='+id+"";
        return true;
    }
}

function abandonarProyecto(id){
    if(confirm('¿Deseas abandonar el proyecto?')){
        window.location.href = '../controlador/controladorPrincipal.php?abandonar='+id+"";
        return true;
    }
}

function deleteSprint(id){
    if(confirm('¿Deseas eliminar el sprint?')){
        window.location.href = '../controlador/controladorPrincipal.php?deleteSprint='+id+"";
        return true;
    }
}

function finalizarSprint(id){
    if(confirm('¿Deseas finalizar el sprint?')){
        window.location.href = '../controlador/controladorPrincipal.php?finalizarSprint='+id+"";
        return true;
    }
}

function eliminarT(id){
    if(confirm('¿Deseas eliminar la tarea?')){
        window.location.href = '../controlador/controladorPrincipal.php?deleteTarea='+id+"";
    }
}

function actualizarDocumento(id){
    if(confirm('¿Deseas eliminar la reunión?')){
        window.location.href = '../controlador/controladorPrincipal.php?borrarDocumento='+id+"";
    }
}