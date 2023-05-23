

    <?php
    // Verificar si se ha enviado el ID del registro a borrar
    if (isset($_GET['id'])) {
        // Obtener el ID del registro
        $id = $_GET['id'];

        // Conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'ciudades');
        if (!$conexion) {
            die('Error al conectar a la base de datos: ' . mysqli_error($conexion));
        }

        // Borrar el registro de la tabla ciudades
        $consulta = "DELETE FROM ciudades WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se pudo borrar el registro
        if ($resultado) {
            echo 'El registro se ha borrado correctamente.';
        } else {
            echo 'Error al borrar el registro: ' . mysqli_error($conexion);
        }

        // Cerrar conexión a la base de datos
        mysqli_close($conexion);
    } else {
        echo 'ID de registro no especificado.';
    }
    ?>

