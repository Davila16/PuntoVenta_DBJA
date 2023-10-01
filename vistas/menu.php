<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        .navbar {
            background-image:rgb(34,193,195); 
        }

        .navbar-inverse .navbar-toggle .icon-bar {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="position:absolute; left:10px">
                    <a class="navbar-brand" href="inicio.php">
                    </a>
                </div>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <div style="position:absolute; left:10px; top:10px;">

                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><span
                                    class="glyphicon glyphicon-list-alt"></span> Administrar Articulos <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="categorias.php">Categorias</a></li>
                                <li><a href="articulos.php">Articulos</a></li>
                            </ul>
                        </li>

                        <?php
                        if ($_SESSION['usuario'] == "admin"):
                        ?>
                        <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
                        </li>
                        <?php
                        endif;
                        ?>
                        <li><a href="clientes.php"><span class="glyphicon glyphicon-user"></span> Clientes</a>
                        </li>
                        <li><a href="ventas.php"><span class="glyphicon glyphicon-usd"></span> Vender Articulo</a>
                        </li>
                </div>
                <div style="position:absolute; right:20px; top:20px;">
                    <li class="dropdown">
                        <a href="#" style="color: yellow" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false"><span
                                class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a style="color: yellow" href="../procesos/salir.php"><span
                                        class="glyphicon glyphicon-off"></span> Salir</a></li>

                        </ul>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(document).scrollTop() > 150) {
            $('.logo').height(200);

        } else {
            $('.logo').height(100);
        }
    });
</script>
