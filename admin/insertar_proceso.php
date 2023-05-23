<?php
// Verificar si se han enviado todos los campos obligatorios
if (isset($_POST['ciudad']) && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['categoria']) && isset($_POST['horario']) && isset($_POST['telefono']) && isset($_POST['x']) && isset($_POST['y'])) {
    // Obtener los datos del formulario
    $ciudad = $_POST['ciudad'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $categoria = $_POST['categoria'];
    $horario = $_POST['horario'];
    $telefono = $_POST['telefono'];
    $x = $_POST['x'];
    $y = $_POST['y'];

    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'ciudades');
    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_error($conexion));
    }

    // Insertar el nuevo registro en la tabla ciudades
    $consulta = "INSERT INTO ciudades (ciudad, nombre, direccion, categoria, horario, telefono, x, y) VALUES ('$ciudad', '$nombre', '$direccion', '$categoria', '$horario', '$telefono', '$x', '$y')";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se pudo insertar el registro
    if ($resultado) {
        echo 'El registro se ha insertado correctamente.';
    } else {
        echo 'Error al insertar el registro: ' . mysqli_error($conexion);
    }

    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo 'Campos obligatorios no especificados. No se puede realizar la inserción.';
}
?>
