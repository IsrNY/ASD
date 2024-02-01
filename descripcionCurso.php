<?php
include 'session.php';
include 'conn.php';
$clave = $_GET["clave"];
$_SESSION["clave"] = $clave;
$rfcm = $_SESSION['rfc'];
if ($conn) {
    $sql = "SELECT NombreCurso, Objetivo,Periodo,Horario,Instructor, RFC FROM cursosactivos WHERE Clave = '$clave'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $curso = $row["NombreCurso"];
        $objetivo = $row["Objetivo"];
        $periodo = $row["Periodo"];
        $horario = $row["Horario"];
        $instructor = $row["Instructor"];
        $rfc = $row['RFC'];
    } else
        header("location:CActivos.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Descripcion de curso</title>
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
                        <td class="negrita" colspan="4">Descripción del curso</td>
                    </tr>
                    <tr>
                        <td>Nombre del curso</td>
                        <td>Objetivo</td>
                        <td>Periodo de realización</td>
                        <td>Horario</td>
                    </tr>
                    <tr>
                        <td><textarea style="whith: ; height:100px;" readonly class="ajuste"><?php echo $curso ?></textarea></td>
                        <td><textarea style="width: ; height:100px;" readonly class="ajuste"><?php echo $objetivo ?></textarea></td>
                        <td><textarea style="width:; height:100px;" readonly class="ajuste"><?php echo $periodo ?></textarea></td>
                        <td><textarea style="width:; height:100px;" readonly class="ajuste"><?php echo $horario ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="der">Instructor(a):</td>
                        <td colspan="2"><?php echo $instructor ?></td>
                        <?php
                        $sql = "SELECT CVU FROM usuarios WHERE RFC = '$rfc'";
                        $result = mysqli_query($conn, $sql);
                        if ($row = mysqli_fetch_array($result)) {
                            if ($row['CVU'] == 'Si') {
                        ?>
                                <td><a class="CA boton_a" href="Archivos/CVU/CVU <?php echo $rfc ?>.pdf" target="blank">Revisar CVU</a></td>
                        <?php
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT cedulaInscripcion FROM cursosparticipantes WHERE RFC = '$rfcm' AND registradoCurso = '$clave'";
                        $result = mysqli_query($conn, $sql);
                        if ($row = mysqli_fetch_array($result))
                            {
                        ?>
                            <td colspan="4"><a class="CA boton_a" href="Archivos/Cedulas/Cédula de Inscripción <?php echo $clave . ' ' . $rfcm ?>.pdf" target="blank">Ver Cédula de Inscripción</a></td>
                        <?php
                        } else {
                        ?>
                            <td colspan="4"><a class="CA boton_a" href="cedulaInscripcion.php">Registrar Cédula de Inscripción</a></td>
                        <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="button" value="Volver" class="configBoton" onclick="location.href='CActivos.php'">
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