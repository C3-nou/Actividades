function sm(contador){
    var input = document.getElementById('scrumM');
    var dato = document.getElementById('sm'+contador);
    if(input.value != dato.value){
        input.value = dato.value;
        window.location.href = "add-miembros.php?sm="+dato.value+"";
    }
}

function desarrollador(contador){
    var input = document.getElementById('desarrollador');
    var dato = document.getElementById('dv'+contador);

    
    if(input.value.length > 0){
        if(input.value != dato.value){
            input.value += ','+dato.value;
            window.location.href = "add-miembros.php?dv="+input.value+"";
        }else if(input.value.indexOf(dato.value)){
            alert('No puedes ingresar dos veces al mismo usuario');
        }
    }else{
        input.value = dato.value;
        window.location.href = "add-miembros.php?dv="+input.value+"";
    }

}