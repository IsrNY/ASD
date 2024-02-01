<?php
include 'session.php';
include 'conn.php';
$usuario = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Principal</title>
    <link rel="stylesheet" href="css/general.css">
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
            <div class="contenedorGral">
                <table>
                    <tr>
                        <td colspan="2" class="negrita">Antes de inscribirse a cualquier curso, favor<br>
                    de llenar sus datos personales y laborales</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        <a class="CA boton_a" href="datosPersonales.php">Datos personales</a>
                        <a class="CA boton_a" href="datosLaborales.php">Datos laborales</a>
                        <a class="CA boton_a" href="CActivos.php">Cursos activos</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        <a class="CA boton_a" href="HCursos.php">Historial de cursos</a>
                        <a class="CA boton_a" href="cambioContra.php?usuario=<?php echo $usuario?>">Cambiar contraseña</a>
                        </td>
                    </tr>
                </table>
            </div>
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