<?php
// Verificar si se ha enviado el ID del registro y los datos a actualizar
if (isset($_POST['id']) && isset($_POST['ciudad']) && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['categoria']) && isset($_POST['horario']) && isset($_POST['telefono']) && isset($_POST['x']) && isset($_POST['y'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
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

    // Actualizar el registro en la tabla ciudades
    $consulta = "UPDATE ciudades SET ciudad = '$ciudad', nombre = '$nombre', direccion = '$direccion', categoria = '$categoria', horario = '$horario', telefono = '$telefono', x = '$x', y = '$y' WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se pudo actualizar el registro
    if ($resultado) {
        echo 'El registro se ha actualizado correctamente.';
    } else {
        echo 'Error al actualizar el registro: ' . mysqli_error($conexion);
    }

    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo 'Datos incompletos. No se puede realizar la actualización.';
}
?>
