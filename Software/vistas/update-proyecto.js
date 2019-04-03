function changeElement(id){
    var dato = document.getElementById('dato',id);
    dato.innerHTML = "<select name='select'>";
    dato.innerHTML += "<option value='2'>Scrum Master</option>";
    dato.innerHTML += "<option value='1'>Desarrollador</option>";
    dato.innerHTML += "</select>";

    window.location.href="update-proyecto.php";
}