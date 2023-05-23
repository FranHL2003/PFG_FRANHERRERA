<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto%20fin%20de%20grado/admin/insertar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <title>Actualizar</title>
  
</head>
<body>
<header>
        <div class="container">
        
          <a href="http://localhost/Proyecto%20fin%20de%20grado/admin/actualizar.php"><h1>ACTUALIZAR</h1></a>
          <nav>
            <ul class="menu">
              <li><a href="http://localhost/Proyecto%20fin%20de%20grado/admin/lugares.php">volver a lugares</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
          
          </nav>
        </div>
    
        <div class="logo">
          <a href="/Proyecto%20fin%20de%20grado/empezar.html"><img src="/Proyecto fin de grado/inicio_img/andalucia.png" alt="Logo"></a>
          
        </div>
    
      </header>
<main>
    <?php
    // Verificar si se ha enviado el ID del registro a actualizar
    if (isset($_GET['id'])) {
        // Obtener el ID del registro
        $id = $_GET['id'];

        // Conexión a la base de datos
        $conexion = mysqli_connect('localhost', 'root', '', 'ciudades');
        if (!$conexion) {
            die('Error al conectar a la base de datos: ' . mysqli_error($conexion));
        }

        // Obtener los datos del registro actual
        $consulta = "SELECT * FROM ciudades WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se encontró el registro
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            ?>
            <p>
            <div class="container2">
              
            <form method="post" action="actualizar_proceso.php">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <h1>Actualizar Lugar</h1>

    <label>Ciudad:</label>
    <select name="ciudad">
        <option value="Malaga" <?php if ($fila['ciudad'] == 'Malaga') echo 'selected'; ?>>Málaga</option>
        <option value="Sevilla" <?php if ($fila['ciudad'] == 'Sevilla') echo 'selected'; ?>>Sevilla</option>
        <option value="Granada" <?php if ($fila['ciudad'] == 'Granada') echo 'selected'; ?>>Granada</option>
        <option value="Cordoba" <?php if ($fila['ciudad'] == 'Cordoba') echo 'selected'; ?>>Córdoba</option>
        <option value="Jaen" <?php if ($fila['ciudad'] == 'Jaen') echo 'selected'; ?>>Jaén</option>
        <option value="Almeria" <?php if ($fila['ciudad'] == 'Almeria') echo 'selected'; ?>>Almería</option>
        <option value="Cadiz" <?php if ($fila['ciudad'] == 'Cadiz') echo 'selected'; ?>>Cádiz</option>
        <option value="Huelva" <?php if ($fila['ciudad'] == 'Huelva') echo 'selected'; ?>>Huelva</option>
    </select><br>

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>"><br>

    <label>Categoría:</label>
    <select name="categoria">
        <option value="Puerto" <?php if ($fila['categoria'] == 'Puerto') echo 'selected'; ?>>Puerto</option>
        <option value="Palacio" <?php if ($fila['categoria'] == 'Palacio') echo 'selected'; ?>>Palacio</option>
        <option value="Edificio Histórico" <?php if ($fila['categoria'] == 'Edificio Histórico') echo 'selected'; ?>>Edificio Histórico</option>
        <option value="Parque" <?php if ($fila['categoria'] == 'Parque') echo 'selected'; ?>>Parque</option>
        <option value="Iglesia" <?php if ($fila['categoria'] == 'Iglesia') echo 'selected'; ?>>Iglesia</option>
        <option value="Estadio" <?php if ($fila['categoria'] == 'Estadio') echo 'selected'; ?>>Estadio</option>
        <option value="Monumentos" <?php if ($fila['categoria'] == 'Monumentos') echo 'selected'; ?>>Monumentos</option>
    </select><br>

    <label>Horario:</label>
    <input type="text" name="horario" value="<?php echo $fila['horario']; ?>"><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>"><br>

    <label>X:</label>
    <input type="text" name="x" id="x" value="<?php echo $fila['x']; ?>"><br>

    <label>Y:</label>
    <input type="text" name="y" id="y" value="<?php echo $fila['y']; ?>"><br>

    <div id="mapid" style="height: 400px;"></div>

    <input type="submit" value="Actualizar">
</form>
               
            </div>
            <p>2</p>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
            <script>
                var map = L.map('mapid').setView([<?php echo $fila['x']; ?>, <?php echo $fila['y']; ?>], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                    maxZoom: 18,
                }).addTo(map);

                var marker = L.marker([<?php echo $fila['x']; ?>, <?php echo $fila['y']; ?>]).addTo(map);

                map.on('click', function (e) {
                    marker.setLatLng(e.latlng);
                    document.getElementById('x').value = e.latlng.lat;
                    document.getElementById('y').value = e.latlng.lng;
                });
            </script>
            <?php
        } else {
            echo 'Registro no encontrado.';
        }

        // Cerrar conexión a la base de datos
        mysqli_close($conexion);
    } else {
        echo 'ID de registro no especificado.';
    }
    ?>
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
