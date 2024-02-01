<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Vista de cursos</title>
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
        <form>
            <div class="contenedorGral">
                <table>
                    <tr>
                        <td class="negrita"><a class="CA boton_a" href="listaCursos.php">Lista de cursos</a></td>
                        <td class="negrita"><a class="CA boton_a" href="cursosFinalizados.php">Cursos finalizados</a></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="button" name="btnVolver" id="btnVolver" value="Salir" 
                    onclick="location.href='administrador.php'" class="configBoton"></td>
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