<?php
include 'session.php';
include 'conn.php';
$rfc = $_SESSION['rfc'];
$clave = $_GET['clave'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor | Principal</title>
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
            <div class = "contenedorGral">
                <table>
                    <tr>
                    <?php
                    $sql = "SELECT CVU FROM usuarios WHERE RFC = '$rfc'";
                    $result = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_array($result)) {
                        if ($row['CVU'] == "Si") {
                    ?>
                        <td><a class="CA boton_a" href="Archivos/CVU/CVU <?php echo $rfc ?>.pdf" target="blank">Revisar CVU</a></td>
                    <?php
                        } else {
                    ?>
                        <td><form method="POST" action="registroCVU.php"><input type="hidden" name="clave" value="<?php echo $clave ?>"><input type="submit" class="CA boton_a" value="Registrar CVU"></form></td>
                    <?php
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT fichaTecnica FROM cursosactivos WHERE clave = '$clave'";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_array($result))
                        {
                        if($row['fichaTecnica']!='Si')
                        {
                        ?>
                        <td><a class="CA boton_a" href="fichaTecnica.php?clave=<?php echo $clave ?>">Registrar ficha técnica</a></td>
                    <?php
                        }
                        else
                        {
                    ?>
                    <td><a class="CA boton_a" href="Archivos/FichasTecnicas/Ficha técnica <?php echo $clave?>.pdf" target="blank">Ver la ficha técnica</a></td>
                    <?php
                        }
                    }
                    ?>
                    </tr>
                    <tr>
                        <td><a class="CA boton_a" href="listaAsistencia.php?clave=<?php echo $clave ?>">Lista de asistencia</a></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" value="Volver" id="botones" onclick="location.href='CActivos.php'">
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