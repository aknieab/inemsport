<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

// Recibir los datos del formulario con nombres de campo en mayúsculas
$username = $_POST['username'];
$password = $_POST['password'];

// Preparar la consulta SQL para evitar inyección SQL
$sql = "SELECT CORREO FROM usuarios WHERE CORREO = ? AND CONTRASEñA = ?";
$stmt = $bd->prepare($sql);

// Usar bindValue para vincular los valores (PDO)
$stmt->bindValue(1, $username, PDO::PARAM_STR);
$stmt->bindValue(2, $password, PDO::PARAM_STR);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró un usuario con ese correo y contraseña
if ($resultado) {
    // Si se encontró, redirigir a la página principal
    header("Location: index.php");
    exit();
} else {
    // Mensaje de error si el inicio de sesión falla
    echo "<h1>Inicio de sesión fallido 😔</h1>";
    echo "<p>El usuario o la contraseña son incorrectos.</p>";
}

// Cerrar la conexión
$stmt = null;
$bd = null;
?>