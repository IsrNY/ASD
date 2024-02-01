<?php
include 'session.php';
include 'conn.php';
$clave = "";
$estado ="";
$nombreC = "";
$objetivo = "";
$periodo = "";
$lugar = "";
$horas = "";
$instructor = "";
$rfc = "";
$dirigidoA = "";
$preRR = "";
$horario = "";
$B = false;
if (isset($_POST['txClave'])) {
    $B = true;
    $clave = $_POST['txClave'];
    $sql = "SELECT * FROM cursosactivos WHERE Clave = '$clave'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($result)) 
    {
        $estado = $row['Estado'];
        $nombreC = $row['NombreCurso'];
        $objetivo = $row['Objetivo'];
        $periodo = $row['Periodo'];
        $lugar = $row['Lugar'];
        $horas = $row['Horas'];
        $instructor = $row['Instructor'];
        $rfc = $row["RFC"];
        $dirigidoA = $row['DirigidoA'];
        $preRR = $row['PreRR'];
        $horario = $row['Horario'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Alta de cursos</title>
    <link rel="stylesheet" href="css/general.css">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javasCript/aCursos.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});
</script>
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
            <form name="aCursos" id="aCursos" method="POST">
                <div class="contenedorGral">
                    <table>
                        <tr>
                            <td class="negrita" colspan="6">Administración de cursos</td>
                        </tr>
                        <tr>
                            <td class="negrita">Clave</td>
                            <td class="negrita">Estado</td>
                            <td class="negrita">Nombre del servicio</td>
                            <td class="negrita">Objetivo</td>
                            <td class="negrita">Periodo de realización</td>
                            <td class="negrita">Lugar o sede</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="txClave" id="txClave" required class="ajuste" value="<?php echo $clave ?>"></td>
                            <td><select name="txEst" id="txEst" class="ajuste">
                            <?php 
                                if ($B) {
                                    if ($estado == "Activo") {
                                        ?>
                                        <option value="Activo" selected>Activo</option>
                                        <option value="En espera">En espera</option>
                                        <?php
                                    }
                                    else if ($estado == "En espera") {
                                        ?>
                                        <option value="Activo">Activo</option>
                                        <option value="En espera" selected>En espera</option>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <option value="Activo">Activo</option>
                                        <option value="En espera">En espera</option>
                                        <option value="Finalizado" selected>Finalizado</option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value="Activo">Activo</option>
                                    <option value="En espera" selected>En espera</option>
                                    <?php
                                }
                            ?>
                            </select></td>
                            <td><input type="text" name="txNombreS" id="txNombreS" class="ajuste" value="<?php echo $nombreC ?>"></td>
                            <td><textarea name="txObjetivo" id="txObjetivo" cols="30" rows="10" class="ajuste"
                            style="height: 50px;"><?php echo $objetivo ?></textarea></td>
                            <td><input type="text" name="txPeriodo" id="txPeriodo" class="ajuste" value="<?php echo $periodo ?>"></td>
                            <td><input type="text" name="txLugar" id="txLugar" class="ajuste" value="<?php echo $lugar ?>"></td>
                        </tr>
                        <tr>
                            <td class="negrita">No. de horas por curso</td>
                            <td class="negrita">Instructor</td>
                            <td class="negrita">RFC (Instructor)</td>
                            <td class="negrita">Dirigido a</td>
                            <td class="negrita">Prerrequisitos</td>
                            <td class="negrita">Horario</td>
                        </tr>
                        <tr>
                            <td><input type="number" name="txNumH" id="txNumH" class="ajuste" value ="<?php echo $horas?>" placeholder="30"></td>
                            <td><input type="text" name="txInstructor" id="txInstructor" class="ajuste" value="<?php echo $instructor ?>"></td>
                            <td><input type="text" name="txRFC" id="txRFC" class="ajuste" value="<?php echo $rfc?>"></td>
                            <td><input type="text" name="txDirigido" id="txDirigido" class="ajuste" value="<?php echo $dirigidoA ?>"></td>
                            <td><input type="text" name="txPre" id="txPre" class="ajuste" value="<?php echo $preRR?>"></td>
                            <td><input type="text" name="txHorarioC" id="txHorarioC" class="ajuste" value="<?php echo $horario ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <input type="button" name="btnRegistrarC" id="btnRegistrarC" class="configBoton"
                                value="Registrar" onclick="registrarCursos()">
                                <input type="button" name="btnModificar" id="btnModificar" class="configBoton"
                                value="Modificar campos" onclick="modificar()">
                                <input type="submit" name="btnBuscarC" id="btnBuscarC" class="configBoton"
                                value="Buscar curso"> 
                                <input type="button" name="btnSalirC" id="btnSalirC" class="configBoton" 
                                value="Salir" onclick="location.href='administrador.php'">
                            </td>
                        </tr>
                        <tr>
                        <td colspan="6">
                                <input type="button" name="reinicio" id="reinicio" 
                                value="Reiniciar formulario" class="configBoton" onclick="limpiarFormulario()">
                        </td>
                        </tr>
                    </table>
                    <div>
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