<?php 
include 'session.php';
$usuario = $_SESSION['user'];
$clave = "";
$rfc = "";
$rfc = $_SESSION['rfc'];
$sql = "SELECT "
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos finalizados</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script>
        function alerta()
        {
            alert("No hay constancia registrada para este curso aún, pero no hay de que preocuparse, pronto se le hará llegar su documento.");
        }
        function al()
        {
            document.getElementById("sinConst").addEventListener("click",alerta,false);
        }
        window.addEventListener("load",al,false);
    </script>
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
                    <td class="negrita" colspan="2">Lista de cursos finalizados</td>
                </tr>
                <tr>
                    <td class="negrita">Nombre del curso</td>
                    <td class="negrita">Área de aplicación</td>
                </tr>
                <?php
                include 'conn.php';
                $rfc = $_SESSION['rfc'];
                $sql = "SELECT * FROM cursoscompletados WHERE RFCparticipante = '$rfc'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    
                    if ($row['RFCparticipante'] == $rfc && $row['constancia']!= '') {
                ?>
                    <tr>
                        <td><a class="CT estiloCursos" href="Archivos/Constancias/<?php echo $row['constancia']?>" target="blank"><?php echo $row['nombreCurso'] ?></a></td>
                        <td><?php echo $row['DirigidoA'] ?></td>
                    </tr>
                <?php
                    } else if($row['constancia']=='') {
                ?>
                    <tr>
                        <td><a class="CA estiloCursos" id= "sinConst"><?php echo $row['nombreCurso'] ?></a></td>
                        <td><?php echo $row['DirigidoA'] ?></td>
                    </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="2">
                        <input type="button" value="Volver" class="configBoton" 
                        onclick="location.href='docentes.php'">
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