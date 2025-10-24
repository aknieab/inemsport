<?php

session_start();
$host = "localhost";
$dbname = "inemsport";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $dbname); //variable de conexion y verificacion
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); 
}
$ID=$_POST["code"];
$NOMBRE=$_POST['name'];
$CORREO=$_POST['email'];
$CONTRASEÑA=$_POST['password'];

$sql="INSERT INTO usuarios (ID,NOMBRE,CORREO,CONTRASEÑA) VALUES ('$ID','$NOMBRE', '$CORREO', '$CONTRASEÑA')";
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
    header("location:login.html");
}else{
        echo "Error al registrar: " . $sql . "<br>" . $conn->error;
}

?>