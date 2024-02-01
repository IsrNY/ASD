<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Cursos activos</title>
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
        <div class="contenedorGral" style="max-height: 400px; overflow-y:auto;">
            <table>
                <tr>
                    <td class="negrita" colspan="2">Cursos disponibles</td>
                </tr>
                <tr>
                    <td class="negrita">Nombre del curso</td>
                    <td class="negrita">Área de aplicación</td>
                </tr>
                <?php
                include 'conn.php';
                $rfc = $_SESSION['rfc'];
                        if ($conn) {
                            $sql = "SELECT Clave, NombreCurso, RFC, DirigidoA FROM cursosactivos WHERE Estado = 'Activo'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['RFC'] != $rfc) {
                        ?>
                        <tr>
                            <td><a class="CA estiloCursos" href="descripcionCurso.php?clave=<?php echo $row['Clave'] ?>"><?php echo $row['NombreCurso'] ?></a></td>
                            <td><?php echo $row['DirigidoA'] ?></td>
                        </tr>
                        <?php
                                }
                                else
                                {
                        ?>
                        <tr>
                            <td><a class="CP estiloCursos" href="instructor.php?clave=<?php echo $row['Clave'] ?>"><?php echo $row['NombreCurso'] ?></a></td>
                            <td><?php echo $row['DirigidoA'] ?></td>
                        </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                <input type="button" name="btnS" id="btnS" value="Volver" 
                                class="configBoton" onclick="location.href='docentes.php'">
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