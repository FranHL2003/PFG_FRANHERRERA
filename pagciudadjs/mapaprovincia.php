<?php
if (isset($_GET["provincia"])) {
    $provincia = $_GET["provincia"];
}
if (isset($_GET["tag"])) {
    $tag = $_GET["tag"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto%20fin%20de%20grado/pagciudadjs/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>MAPA DE <?= $provincia ?></title>
    <style>
        body {
            background: linear-gradient(#ffe6c1, #bbffd0);

        }

        h1 {
            color: white;
            text-decoration: none;
        }

        a {
            text-decoration: none;
            color: white
        }

        #mapa {
            height: 100vh;
        }

        .listado {
            height: 100vh;
            overflow-y: scroll;
        }

        .row {
            padding: 0;
            margin: 0;
        }
        .tarjeta1{
  margin-right: 2%;
  color: rgb(255, 255, 255);
  background-color:#09933e;
  padding: 0 2%;
  border-radius: 5px;
}
.tarjeta0{
  margin-right: 2%;
  color: rgb(255, 255, 255);
  background-color:#0ddde1;
  padding: 0 2%;
  border-radius: 5px;
}


    </style>
</head>

<body>
    <header>
        <div class="container">

           
        <h1><?= $provincia ?> - <?= $tag ?></h1>
            </a>
            <nav>
                <ul class="menu">
                    <li><a href="http://localhost/Proyecto%20fin%20de%20grado/admin/registrar.php">Administrador</a></li>
                    <li><a href="http://localhost/Proyecto%20fin%20de%20grado/contacto/contacto.html">Contacto</a></li>
                   
                </ul>

            </nav>
        </div>

        <div class="logo">
            <a href="/Proyecto%20fin%20de%20grado/empezar.html"><img
                    src="/Proyecto fin de grado/inicio_img/andalucia.png" alt="Logo"></a>

        </div>

    </header>
    <main>

        <div class="contenedor">
            <div class="row vh-100">
                <div class="col-3 listado" id="listaElementos">
                    <template id="elementoLista">
                        <div class="p-3 elemento" id="elemento" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div id="nombre" class="h5"></div>
                            <div id="ciudad" class="tarjeta0"></div>
                            <div id="categoria" class="tarjeta1"></div>
                            <div class="direccionYtelefono">

                                <div id="direccion" class="tarjeta"></div>
                                <div id="telefono"></div>
                                <div id="horario" class="tarjeta"></div>
                                <div id="ver" href=""></div>
                            </div>
                        </div>

                    </div>

                </template>


            </div>
            <div class="col mapa">
                <div id="mapa"></div>
            </div>
        </div>
    </div>





    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
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

    <script>
        var provincia = "<?= $provincia ?>";
        var tag = "<?= $tag ?>";

    </script>
    <script src="/Proyecto%20fin%20de%20grado/pagciudadjs/mapa.js"></script>

</body>

</html>
