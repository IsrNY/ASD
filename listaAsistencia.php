<?php
include 'conn.php';
include 'session.php';
$clave = $_GET['clave'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor | Lista de asistencia</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="javaScript/finalizarCurso.js" type="text/javascript"></script>
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>

<body>
<nav><span style="float: left;"><b><?php echo $nombre ?> </b></span><a href="logout.php" class="der"><b>Cerrar sesión</b></a></nav>
    <header>
        <img src="header_ithua.png" width="100%">
        <br>
        <span class = "Titulos"><b>Sistema de Administración y Resguardo Documental de Formación Profesional y Docente</b></span>
</header>
    <div class="INN" style ="height:85vh;">
        <section>
            <form name="fLista" id="fLista" action='ListaA.php' method="POST">
                <?php
                $sql = "SELECT NombreCurso, Instructor, RFC, DirigidoA, Periodo, Horas, Horario FROM cursosactivos WHERE Clave = '$clave'";
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_array($result)) {
                ?>
                    <input type="hidden" name="curso" value="<?php echo $row['NombreCurso'] ?>"><br>
                    <input type="hidden" name="instructor" value="<?php echo $row['Instructor'] ?>"><br>
                    <input type="hidden" name="rfci" value="<?php echo $row['RFC'] ?>"><br>
                    <input type="hidden" name="dirigido" value="<?php echo $row['DirigidoA'] ?>">
                    <input type="hidden" name="periodo" value="<?php echo $row['Periodo'] ?>"><br>
                    <input type="hidden" name="duracion" value="<?php echo $row['Horas'] ?>"><br>
                    <input type="hidden" name="horario" value="<?php echo $row['Horario'] ?>"><br>
                <?php
                }
                ?>
                <div class="contenedorGral" style="max-height:450px; overflow-y:auto;">
                    <?php
                    $sql = "SELECT RFC, Estado FROM cursosactivos WHERE Clave = '$clave'";
                    $query = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_array($query)) {
                        if ($row['Estado'] == 'Activo') {
                            $ca = $row['Estado'];
                    ?>
                            <table>
                                <tr>
                                    <td class="negrita" colspan="11">Lista de asistencia</td>
                                </tr>
                                <tr>
                                    <td class="negrita" colspan="11"> Asistencia</td>
                                </tr>
                                <tr>
                                    <td class="negrita">Nombre del participante</td>
                                    <td class="negrita">RFC</td>
                                    <td class="negrita">Área de adscripción</td>
                                    <td class="negrita">Sexo</td>
                                    <td class="negrita">D/A</td>
                                    <td class="negrita">Lun</td>
                                    <td class="negrita">Mar</td>
                                    <td class="negrita">Mie</td>
                                    <td class="negrita">Jue</td>
                                    <td class="negrita">Vie</td>
                                </tr>
                                <?php

                                $sql = "SELECT nombreParticipante, RFC, areaAdsc, sexo, DirAd FROM cursosparticipantes WHERE RegistradoCurso = '$clave' ORDER BY nombreParticipante ASC";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><textarea name="<?php echo $row['RFC'] ?>NP"><?php echo $row["nombreParticipante"] ?></textarea></td>
                                        <td><span name="<?php echo $row["RFC"] ?>RFC"><?php echo $row["RFC"] ?></span></td>
                                        <td><?php echo $row["areaAdsc"] ?></td>
                                        <td><?php echo $row["sexo"] ?></td>
                                        <td><?php echo $row["DirAd"] ?></td>
                                        <td><input type="checkbox" value="1" name="<?php echo $row['RFC'] ?>Lun"></td>
                                        <td><input type="checkbox" value="1" name="<?php echo $row['RFC'] ?>Mar"></td>
                                        <td><input type="checkbox" value="1" name="<?php echo $row['RFC'] ?>Mier"></td>
                                        <td><input type="checkbox" value="1" name="<?php echo $row['RFC'] ?>Juev"></td>
                                        <td><input type="checkbox" value="1" name="<?php echo $row['RFC'] ?>Vier"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        <?php
                        } else {
                        ?>
                            <span><strong>Curso Terminado</strong></span>
                    <?php
                        }
                    }
                    ?>

                </div>
                <?php if ($ca == 'Activo') { ?>
                    <input type="text" value="<?php echo $clave ?>" name="txCla" id="txCla" hidden>
                    <input type="submit" value="Finalizar curso" class="configBoton centro">
                <?php } ?>
                <input type="button" value="Página principal" class="configBoton centro" onclick="location.href='CActivos.php'">
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