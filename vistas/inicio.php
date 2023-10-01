<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Página de Tenis</title>
    <style>
        body {
            background-image: url("../img/ggg.gif");
            background-size: cover;
            background-position: relative;
            background-repeat: no-repeat;
        }

        .btn-productos {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <?php 
        session_start();
        if(isset($_SESSION['usuario'])){
    ?>
    <?php require_once "menu.php"; ?>

    <div class="container">
        <h1 style="color:black; font-family: 'Arial Black', sans-serif; font-weight: bold;">¡¡¡Bienvenido a la Mejor Tienda de Tenis!!!</h1>
        <a href="articulos.php" class="btn btn-danger btn-xl">
            <span class="glyphicon glyphicon-shopping-cart"></span> Ver Productos
        </a>
    </div>

    <?php 
        } else {
            header("location:../index.php");
        }
    ?>
 <div class="footer">
    <p>&copy; 2023 Sneaker Store</p>
    <p>Para que cuelgues los tenis con estilo</p>
    <a href="https://www.google.com.mx/maps/place/Centro+Universitario+UAEM+Texcoco/@19.4349961,-98.920144,17z/data=!3m1!4b1!4m6!3m5!1s0x85d1e150c9a75a6b:0xa7c41d86b5d7b13c!8m2!3d19.4349911!4d-98.9175691!16s%2Fg%2F1tf8tfml?entry=ttu" target="_blank">Ubicacion</a>
    <a href="https://www.facebook.com/adrian.davila.188?mibextid=ZbWKwL" target="_blank">¿Quienes somos?</a>
    <a href="https://api.whatsapp.com/send?phone=5533781305" target="_blank">contactanos</a>
</div>


</body>

</html>
