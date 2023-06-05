<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ciudades";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

// Consulta SQL para verificar si el correo y la contraseña existen en la tabla "admin"
$sql = "SELECT * FROM admin WHERE correo='$correo' AND contrasena='$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Los datos coinciden, usuario autenticado
    echo "Inicio de sesión exitoso. ¡Estás dentro! Disfruta.";
    // Redirigir a otra página
    header("refresh:0.5;url=/Proyecto%20fin%20de%20grado/admin/lugares.php");
} else {
    // Los datos no coinciden, usuario no autenticado
    echo "Correo o contraseña incorrectos, prueba de nuevo";
    header("refresh:0.5;url=/Proyecto%20fin%20de%20grado/admin/entrarAdmin.php");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
