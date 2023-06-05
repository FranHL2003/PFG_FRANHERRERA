<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ciudades";

if(isset($_GET["province"])){
  $province = $_GET["province"];
}

if(isset($_GET["tag"])){
  $tag = $_GET["tag"];
}

function getPoisByProvince($province, $tag = null){
  global $servername;
  global $username;
  global $password;
  global $dbname;

  // Crea una conexión a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica si hay errores en la conexión
  if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
  }

  // Consulta los datos de la tabla ciudades que correspondan a la provincia seleccionada
  $sql = "SELECT ciudad, id, nombre, direccion, telefono, categoria, horario, ver, x, y FROM ciudades WHERE ciudad LIKE '%" . $province . "%'";

  // Si se proporciona un tag, filtra por el tag correspondiente
  if ($tag) {
    $sql .= " AND categoria LIKE '%" . $tag . "%'";
  }

  $result = $conn->query($sql);

  // Verifica si la consulta ha devuelto resultados
  if ($result->num_rows > 0) {
    // Crea un array para almacenar los resultados de la consulta
    $ciudades = array();

    // Recorre los resultados de la consulta y los almacena en el array
    while($row = $result->fetch_assoc()) {
      $ciudades[] = $row;
    }

    // Convierte el array a formato JSON
    $json = json_encode($ciudades);

    // Devuelve el resultado en formato JSON
    return $json;
  } else {
    return null;
  }

  // Cierra la conexión a la base de datos
  $conn->close();
}

echo getPoisByProvince($province, $tag);
?>
