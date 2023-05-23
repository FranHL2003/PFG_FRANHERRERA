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

// Consulta SQL para insertar el nuevo usuario
$sql = "INSERT INTO admin (correo, contrasena) VALUES ('$correo', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a entrarAdmin.php
    header("Location:/Proyecto%20fin%20de%20grado/admin/entrarAdmin.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

