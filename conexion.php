<?php
//conexion a la base de datos
$cadena = "mysql:host=localhost;dbname=bdropa";
$conexion = new PDO($cadena,"root","");

//capturar la informacion del formulario 
$email = $_POST["email"];
$clave = $_POST["password"];

//preparamos la consulta
$consulta=$conexion->prepare("select *from usuario where email=;email and clave=;clave");
$consulta->bindParam(":email",$email);
$consulta->bindParam(":clave",$clave);
$consulta->execute();

//preguntamos si realmente existe un usuario
if($consulta->rowCount()>0)
    header("location:inicio.php");
else
    header("location:index.html");

?>