<?php
// Establecer la conexión a la base de datos (reemplaza los detalles con los correctos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ciudades";

// Obtener el parámetro de la URL (ciudad)
$ciudad = $_GET['ciudad'];

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las coordenadas de la ciudad especificada
$sql = "SELECT x, y FROM mapas WHERE ciudad = '$ciudad'";
$result = $conn->query($sql);

$coordenadas = array();

if ($result->num_rows > 0) {
    // Recorrer los resultados y guardar las coordenadas en un array
    while ($row = $result->fetch_assoc()) {
        $coordenadas[] = $row;
    }
}

// Devolver las coordenadas como respuesta JSON
header('Content-Type: application/json');
echo json_encode($coordenadas);

$conn->close();
?>
