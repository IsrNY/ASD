<?php
include 'session.php';
$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Principal</title>
    <link rel="stylesheet" href="css/general.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<nav><span style="float: left;"><b><?php echo $nombre ?> </b></span><a href="logout.php" class="der"><b>Cerrar sesión</b></a></nav>
    <header>
        <img src="header_ithua.png" width="100%">
        <br>
        <span class = "Titulos"><b>Sistema de Administración y Resguardo Documental de Formación Profesional y Docente</b></span>
</header>
    <div class="INN">
        <section>
            <form>
                <div class="contenedorGral">
                    <table class="tgeneral">
                        <tr>
                            <td><a class="CA boton_a" href="altaCursos.php">Dar de alta cursos</a></td>
                        </tr>
                        <tr>
                            <td><a class="CA boton_a" href="cursosRegistrados.php">Cursos registrados</a></td>
                        </tr>
                        <tr>
                            <td><a class="CA boton_a" href="administrarUsuarios.php">Administrar usuarios</a></td>
                        </tr>
                    </table>
                </div>
            </form>
        </section>
    </div>
    <footer>
        <small>
            Tecnológico Nacional de México <br> Instituto Tecnológico de Huatabampo
            <br>2021 Todos los derechos reservados
        </small>
    </footer>
</body>

</html>