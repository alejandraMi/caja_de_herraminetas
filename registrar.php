window.location="index.html";
<?php

use function PHPSTORM_META\elementType;

include 'cn.php';

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];


$expresion = "/\w+@\w+\.[a-zA-Z]{2,6}/";




$insetar = "INSERT INTO mensajes(nombre,correo, mensaje)
VALUES ('$nombre', '$correo', '$mensaje')";

if(isset($_POST['boton'])){
    if(empty($nombre)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
    }
  
    else if(empty($correo)){
        echo '<script language="javascript">
        window.location="index.html;
        </script>';
        exit();
    }
    
     else if(empty($mensaje)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
     }
    
}//cierra isset



$verificar_correo = mysqli_query($conexion, "SELECT * FROM mensajes WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo '<script language="javascript">alert("Error: El correo ya existe"); window.location="index.html";</script>';
    exit;
}

if(strlen($nombre)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 
 
if(strlen($correo)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
}  

if (!preg_match($expresion, $correo)) {
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit();
}


//ejecutar consulta
$resultado = mysqli_query($conexion,$insetar);
if(!$resultado){
    echo 'Error al registrar contacto';
} else {
 
    // // header("Location: codigo.html");
// exit;
    echo '<script language="javascript">alert("contacto registrado exitosamente"); window.location="crearcuenta.html";</script>';
}

mysqli_close($conexion);