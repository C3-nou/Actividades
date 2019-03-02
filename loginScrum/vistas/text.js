function sm(contador){
    var input = document.getElementById('scrumM');
    var dato = document.getElementById('sm'+contador);
    if(input.value != dato.value){
        input.value = dato.value;
        window.location.href = "add-miembros.php?sm="+dato.value+"";
    }
}

function desarrollador(contador){
    //var input = document.getElementById('desarrollador');
    var dato = document.getElementById('dv'+contador);

    //alert("HOla");
    
    if(dato.value.length > 0){
        
        window.location.href = "add-miembros2.php?dv="+dato.value+"";
    }

}