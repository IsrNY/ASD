<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Administrador | Lista de cursos</title>
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
            <form method="POST" action="ListaC.php">
                <div class="contenedorGral" style="max-height:340px; overflow-y:auto;">
                    <table>
                        <tr>
                            <td class="negrita" colspan="11">Cursos activos</td>
                        </tr>
                        <tr>
                            <td class="negrita">Clave</td>
                            <td class="negrita">Nombre de curso</td>
                            <td class="negrita">Objetivo</td>
                            <td class="negrita">Periodo</td>
                            <td class="negrita">Lugar</td>
                            <td class="negrita">Horas</td>
                            <td class="negrita">Instructor</td>
                            <td class="negrita">RFC</td>
                            <td class="negrita">Dirigido a</td>
                            <td class="negrita">Prerrequisitos</td>
                            <td class="negrita">Horario</td>
                        </tr>
                        <?php
                        include 'conn.php';
                        if ($conn) {
                            $sql = "SELECT Clave, NombreCurso, Objetivo, Periodo, Lugar, Horas, Instructor,RFC,
                                DirigidoA, PreRR, Horario FROM cursosactivos WHERE Estado = 'Activo' || Estado = 'En espera'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $row["Clave"] ?></td>
                                    <td><?php echo $row["NombreCurso"] ?></td>
                                    <td><textarea readonly style="height:80px;"><?php echo $row["Objetivo"] ?></textarea></td>
                                    <td><?php echo $row["Periodo"] ?></td>
                                    <td><?php echo $row["Lugar"] ?></td>
                                    <td><?php echo $row["Horas"] ?></td>
                                    <td><?php echo $row["Instructor"] ?></td>
                                    <td><?php echo $row["RFC"] ?></td>
                                    <td><?php echo $row["DirigidoA"] ?></td>
                                    <td><?php echo $row["PreRR"] ?></td>
                                    <td><?php echo $row["Horario"] ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <input type="submit" name="txgenerarReporte" id="txgenerarReporte" value="Generar reporte" class="configBoton centro">
                <input type="button" name="btnVolverUR" id="btnVolverUR" value="Volver" class="configBoton centro" onclick="location.href='cursosRegistrados.php'">
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