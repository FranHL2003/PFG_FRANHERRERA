<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto%20fin%20de%20grado/admin/lugares.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>lugares</title>
</head>

<body>
<header>
        <div class="container">
        
          <a href="http://localhost/Proyecto%20fin%20de%20grado/start.html"><h1>LUGARES LISTADO</h1></a>
          <nav>
            <ul class="menu">
              <li><a href="http://localhost/Proyecto%20fin%20de%20grado/empezar.html">Ciudades Menú</a></li>
              <li><a href="http://localhost/Proyecto%20fin%20de%20grado/admin/entrarAdmin.php">Volver al Registro</a></li>
            </ul>
          
          </nav>
        </div>
    
        <div class="logo">
          <a href="/Proyecto%20fin%20de%20grado/empezar.html"><img src="/Proyecto fin de grado/inicio_img/andalucia.png" alt="Logo"></a>
          
        </div>
    
      </header>
  <main>
    <h1 class="titulo">CONJUNTO DE LUGARES</h1>

    <?php
    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'ciudades');
    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_error($conexion));
    }

    // Paginación
    $registrosPorPagina = 10;
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($paginaActual - 1) * $registrosPorPagina;

    // Obtener el total de registros en la tabla ciudades
    $consultaTotal = "SELECT COUNT(*) AS total FROM ciudades";
    $resultadoTotal = mysqli_query($conexion, $consultaTotal);
    $filaTotal = mysqli_fetch_assoc($resultadoTotal);
    $totalRegistros = $filaTotal['total'];

    // Calcular el número de páginas
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

    // Obtener los registros para la página actual
    $consulta = "SELECT * FROM ciudades LIMIT $inicio, $registrosPorPagina";
    $resultado = mysqli_query($conexion, $consulta);

    // Mostrar la tabla de datos
    if (mysqli_num_rows($resultado) > 0) {
        echo '<div class="container">';
        echo '<table>';
        echo '<tr><th>ID</th><th>Ciudad</th><th>Nombre</th><th>Dirección</th><th>Categoría</th><th>Horario</th><th>Teléfono</th><th>X</th><th>Y</th><th>Acciones</th></tr>';

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $fila['id'] . '</td>';
            echo '<td>' . $fila['ciudad'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['direccion'] . '</td>';
            echo '<td>' . $fila['categoria'] . '</td>';
            echo '<td>' . $fila['horario'] . '</td>';
            echo '<td>' . $fila['telefono'] . '</td>';
            echo '<td>' . $fila['x'] . '</td>';
            echo '<td>' . $fila['y'] . '</td>';
            echo "<td><a href='actualizar.php?id=" . $fila['id'] . "'>Actualizar</a></td>";
            echo "<td><a href='borrar.php?id=" . $fila['id'] . "'>Borrar</a></td>"; 
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo 'No se encontraron registros.';
    }






// Mostrar la paginación
echo '<div class="pagination">';
if ($totalPaginas > 1) {
    echo '<span>Páginas:</span>';
    if ($paginaActual > 1) {
        echo '<a href="?pagina=1">Primera</a>';
        $anterior = $paginaActual - 1;
        echo '<a href="?pagina=' . $anterior . '">Anterior</a>';
    }

    $rangoInicio = $paginaActual - 3;
    $rangoFin = $paginaActual + 3;

    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($i == 1 || ($i >= $rangoInicio && $i <= $rangoFin) || $i == $totalPaginas) {
            if ($i == $paginaActual) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
            }
        } elseif ($i == $rangoInicio - 1 || $i == $rangoFin + 1) {
            echo '<span class="dots">...</span>';
        }
    }

    if ($paginaActual < $totalPaginas) {
        $siguiente = $paginaActual + 1;
        echo '<a href="?pagina=' . $siguiente . '">Siguiente</a>';
        echo '<a href="?pagina=' . $totalPaginas . '">Última</a>';
    }
}
echo '</div>';

// ...



    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
    ?>

    <a href="insertar.php" class="btn-insertar">Insertar</a>
    <p>copyright</p>
</main>
<footer>
      <div class="container">
        <ul class="social-media">
          <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <div class="links">
          <a href="#">Aviso legal</a>
          <a href="#">Sobre cookies</a>
        </div>
      </div>
    </footer>
</body>
</html>

