<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Cursos finalizados</title>
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
                            <td class="negrita" colspan="11">Cursos finalizados</td>
                        </tr>
                        <tr>
                            <td class="negrita">Nombre de curso</td>
                            <td class="negrita">Instructor</td>
                        </tr>
                        <?php
                        include 'conn.php';
                        if ($conn) {
                            $sql = "SELECT Clave, NombreCurso, Instructor FROM cursosactivos WHERE Estado = 'Finalizado'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><a class = "boton_a" href="participantes.php?clave=<?php echo $row['Clave'] ?>"><?php echo $row["NombreCurso"]?></a></td>
                                    <td><?php echo $row["Instructor"]?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                </table>
            </div>
            <input type="button" name="btnVolver" value="Salir" class="configBoton centro"
                    onclick="location.href='cursosRegistrados.php'">
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