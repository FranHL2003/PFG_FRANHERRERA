<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto%20fin%20de%20grado/admin/insertar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <title>Document</title>
  
</head>
<body>
<header>
        <div class="container">
        
          <a href="http://localhost/Proyecto%20fin%20de%20grado/admin/insertar.php"><h1>INSERTAR</h1></a>
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
    <div class="container2">
        <form method="post" action="insertar_proceso.php" class="container">
            <h1>Insertar Lugar</h1>
            <div class="map-container">
            <div class="map-frame">
                <div id="map"></div> <!-- Aquí se encuentra el div con el id "map" -->
            </div>
        </div>
            <label>Ciudad:</label>
            <select name="ciudad" required>
                <option value="Almeria">Almeria</option>
                <option value="Jaen">Jaen</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Malaga">Malaga</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Cadiz">Cadiz</option>
                <option value="Huelva">Huelva</option>
                <option value="Granada">Granada</option>
            </select><br>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="en mayusculas" required><br>
            <label>Dirección:</label>
            <input type="text" name="direccion" placeholder="calle" required><br>
            <label>Categoría:</label>
            <select name="categoria" required>
                <option value="Parque">Parque</option>
                <option value="Palacio">Palacio</option>
                <option value="Iglesia">Iglesia</option>
                <option value="Monumentos">Monumentos</option>
                <option value="Puerto">Puerto</option>
                <option value="Edificio Histórico">Edificio Histórico</option>
                <option value="Estadio">Estadio</option>
                
            </select><br>
            <label>Horario:</label>
            <input type="text" name="horario" placeholder="horarios" required><br>
            <label>Teléfono:</label>
            <input type="text" name="telefono" placeholder="num de tlf" required><br>
            <label>X:</label>
            <input type="text" name="x" id="x" placeholder="latitud (openstreetmap)" required><br>
            <label>Y:</label>
            <input type="text" name="y" id="y" placeholder="longitud (openstreetmap)" required><br>
            <input type="submit" value="Insertar" class="btn-insertar">
        </form>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<script>
    var map = L.map('map').setView([36.7821, -4.5016], 11);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);

    var marker;

    function onMapClick(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        document.getElementById('x').value = e.latlng.lat;
        document.getElementById('y').value = e.latlng.lng;
    }

    map.on('click', onMapClick);
</script>
</body>
</html>
