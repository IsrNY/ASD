<?php
include 'session.php';
include 'conn.php';
$clave = $_GET['clave'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Principal</title>
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/subirCons.js" type="text/javascript"></script>
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
            <div class="contenedorGral" style="max-height:400px; overflow-y:auto;">
                <form name="constancias" id="constancias">
                    <table>
                        <tr>
                            <td colspan="2" class="negrita">Participantes del curso</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nota: Estos son los participantes que si terminaron el curso</td>
                        </tr>
                        <tr>
                            <td class="negrita">Nombre del participante</td>
                            <td class="negrita">Cargar constancias</td>
                        </tr>
                        <?php
                        $_SESSION['rfcc'] = array();
                        $rfci = '';
                        $sql = "SELECT Instructor, RFC FROM cursosactivos WHERE Clave = $clave AND Estado = 'Finalizado'";
                        $result = mysqli_query($conn, $sql);
                        if ($row = mysqli_fetch_array($result)) {
                            $rfci = $row['RFC'];
                            $sql = "SELECT COUNT(RFCparticipante) AS RFC FROM cursoscompletados WHERE RFCparticipante = '$rfci' AND claveCurso = '$clave' AND constancia = ''";
                            $usu = mysqli_query($conn, $sql);
                            if ($r = mysqli_fetch_array($usu)) {
                                if ($r['RFC'] == 1) {
                        ?>
                            <tr>
                                <td><span class="CP estiloCursos"><?php echo $row['Instructor'] ?></span></td>
                                <td><input type="file" name="<?php echo $row['RFC'] ?>File" style="color:black;"></td>
                            </tr>
                        <?php
                                }
                            }
                            array_push($_SESSION['rfcc'], $rfci);
                        }
                        $sql = "SELECT RFCparticipante AS RFC FROM cursoscompletados WHERE claveCurso = $clave AND constancia = ''";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $x = $row['RFC'];
                            if ($x != $rfci) {
                                $sql = "SELECT Nombre, Apellidos FROM usuarios WHERE RFC = '$x'";
                                $usu = mysqli_query($conn, $sql);
                                if ($r = mysqli_fetch_array($usu)) {
                        ?>
                            <tr>
                                <td><span class="CA estiloCursos"><?php echo $r['Nombre'] . ' ' . $r['Apellidos'] ?></span></td>
                                <td><input type="file" name="<?php echo $x ?>File" class="ajuste" style="color:black;"></td>
                            </tr>
                        <?php
                                }
                                array_push($_SESSION['rfcc'], $x);
                            }
                        }
                        ?>
                    </table>
                    <input type="hidden" name="clave" value="<?php echo $clave ?>">
            </div>
            <?php
            $sql = "SELECT COUNT(claveCurso) AS X FROM cursoscompletados WHERE claveCurso = $clave AND constancia = ''";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)) {
                if ($row['X'] >= 1) {
            ?>
            <input type="button" value="Subir Constancias" id="subir" class = "configBoton centrol" style = "width:150px;"> 
            <?php
                }
            }
            ?>
            <input type="button" value="Volver" onclick="location.href='cursosFinalizados.php'" class="configBoton centro">
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