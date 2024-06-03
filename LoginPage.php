<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Hotel - Login</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/LoginPage.css">
</head>
<body>
    <section>
        <div id="contenedorDiseno">
            <div id="contenedorOla">
                <img src="img/waveLogin.png" alt="" id="ola">
            </div>
            <div id="contenedorContenido">
                <div id="contenedorPuntos">
                    <img src="img/puntosLogin.svg" alt="">
                </div>
                <div id="contenido1">
                    <div>
                        <img src="img/logo.svg" alt="" class="logo">
                        <h2>¡Tu destino digital comienza aqui!</h2>
                        <img src="img/hotelLogin.png" alt="">
                    </div>
                    <img src="img/picosLogin.svg" alt="" id="picos">
                </div>
            </div>
        </div>
        <div id="contenedorLogin">
            <div id="contenedorPrincipalLogin">
                <div id="logoLabelAurora">
                    <img src="img/Logo2.svg" alt="" class="logo">
                    <h1>Aurora</h1>
                </div>
                <form action="conex.php" method="post">
                <div class="contenedor form-floating" style="margin-top: 120px;">
                    <label for="txtCorreo">Correo</label>
                    <input type="email" id="txtCorreo" name="txtCorreo" class="form-control">
                </div>
                <div class="contenedor form-floating">
                    <label for="txtContrasena">Contraseña</label>
                    <input type="text" id="txtContrasena" name="txtContrasena" class="form-control">
                </div>
                <button id="ingresar" type="submit">INGRESAR</button>
            </div>
        </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script
      src="https://kit.fontawesome.com/c82bfcd167.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/srollReveal.js"></script>
</body>
</html>