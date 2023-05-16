function validar(){
    var nombre, correo, mensaje;
    nombre = document.getElementById("nombre").value;
    correo = document.getElementById("correo").value;
    mensaje = document.getElementById("mensaje").value;
    

    expresion = /\w+@\w+\.[a-zA-Z]{2,6}/;

    if (nombre===""|| correo==="" || mensaje===""){
        alert("Todos los campos son obligatorios");
        return false;
    }


    if(nombre.length>30)
    {
        alert("El nombre es demasiado largo");
        return false;
    }
   
    else if(correo.length>30)
    {
        alert("El correo es demasiado largo");
        return false;
    }
    else if(mensaje.length>200){
        alert("El mensaje debe contener maximo 200 caracteres");
        return false;
    }
}