<?php
include 'session.php';
include 'conn.php';
$clave = $_SESSION["clave"];
$user = $_SESSION["user"];
if ($conn) {
    $sql = "SELECT NombreCurso, Instructor, Periodo, Horario, Horas FROM cursosactivos WHERE Clave = '$clave'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $nombreCurso = $row["NombreCurso"];
        $nombreInstructor = $row["Instructor"];
        $periodo = $row["Periodo"];
        $horario = $row["Horario"];
        $horas = $row["Horas"];
    }
    $sql = "SELECT * FROM usuarios WHERE Usuario = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $nom = $row["Nombre"];
        $apellidos = $row["Apellidos"];
        $rfc = $row["RFC"];
        $curp = $row["CURP"];
        $correo = $row["Correo"];
        $estudios = $row["Estudios"];
        $nombreCarrera = $row["NombreCarrera"];
        $sexo = $row["Sexo"];
        $nombreCompleto = $nom." ".$apellidos;
        $I = $row["InstCent"];
        $area = $row["Area"];
        $puesto = $row["Puesto"];
        $jefe = $row["Jefe"];
        $telefono =$row["Telefono"];
        $ext = $row["Ext"];
        $hrio = $row["Horario"];
    }
}
?>
<?php
date_default_timezone_set('America/Hermosillo');
$hoy = getdate();
$fecha = $hoy["mday"];
if ($fecha < 10)
    $fecha = '0' . $fecha . '/';
else
    $fecha = $fecha . '/';
switch ($hoy['mon']) {
    case 1:
        $fecha = $fecha . 'Enero' . '/' . $hoy['year'];
    break;
    case 2:
        $fecha = $fecha . 'Febrero' . '/' . $hoy['year'];
    break;
    case 3:
        $fecha = $fecha . 'Marzo' . '/' . $hoy['year'];
    break;
    case 4:
        $fecha = $fecha . 'Abril' . '/' . $hoy['year'];
    break;
    case 5:
        $fecha = $fecha . 'Mayo' . '/' . $hoy['year'];
    break;
    case 6:
        $fecha = $fecha . 'Junio' . '/' . $hoy['year'];
    break;
    case 7:
        $fecha = $fecha . 'Julio' . '/' . $hoy['year'];
    break;
    case 8:
        $fecha = $fecha . 'Agosto' . '/' . $hoy['year'];
    break;
    case 9:
        $fecha = $fecha . 'Septiembre' . '/' . $hoy['year'];
    break;
    case 10:
        $fecha = $fecha . 'Octubre' . '/' . $hoy['year'];
    break;
    case 11:
        $fecha = $fecha . 'Noviembre' . '/' . $hoy['year'];
    break;
    case 12:
        $fecha = $fecha . 'Diciembre' . '/' . $hoy['year'];
    break;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Cédula de inscripción</title>
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
    <section>
        <form name="fCedulaI" id="fCedulaI" method="POST" action="Cedula.php">
        <table class="ajustetablas1">
            <tr>
                <td colspan="4">
                    <h1> CÉDULA DE INSCRIPCIÓN </h1>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="1" class="izq">Fecha: <input type="text" class="form-control ajuste"  value="<?php echo $fecha;?>" style="width: 75%;" readonly></td>
            </tr>
            <tr>
                <td colspan="4" class="negrita">
                    DATOS DEL EVENTO
                </td>
            </tr>
            <tr>
                <td colspan="1" class="izq">Clave del curso: </td>
                <td colspan="3"><input type="number" name="claveCurso" id="claveCurso" value="<?php echo $clave?>" class="ajuste" readonly></td>
            </tr>
            <tr>
                <td colspan="1" class="izq">Nombre del curso: </td>
                <td colspan="3"><input type="text" name="nombreCurso" id="nombreCurso" value="<?php echo $nombreCurso?>" class="ajuste" readonly></td>
            </tr>
            <tr>
                <td colspan="1" class="izq">Nombre del instructor responsable: </td>
                <td colspan="3"><input type="text" name="nombreInstructor" id="nombreInstructor" value="<?php echo $nombreInstructor?>" class="ajuste" readonly>
                </td>
            </tr>
            <tr>
                <td colspan="1" class="izq">Periodo de realización: </td>
                <td colspan="3"><input type="text" name="periodoRealizacion" id="periodoRealizacion" value="<?php echo $periodo?>"
                        class="ajuste" placeholder="Ejemplo: dd/mm/aaaa al dd/mm/aaaa" readonly></td>
            </tr>
            <tr>
                <td class="der">Horario:</td>
                <td><input type="text" name="horario" id="horario" value="<?php echo $horario?>"
                class="ajuste" placeholder="Ejemplo: 00:00 a.m. a 00:00 p.m." readonly></td>
                <td class="der">Duración:</td>
                <td><input type="text" name="duracion" id="duracion" value="<?php echo $horas ." horas"?>"
                class="ajuste" placeholder="Cantidad de horas" readonly></td>
            </tr>
            <tr>
                <td class="negrita" colspan="4">
                    DATOS PERSONALES
                </td>
            </tr>
            <tr>
                <td colspan="3" class="der">Sexo:</td>
                <td class="izq">
                <input type="text" name="txSexo" id="txSexo" value="<?php echo $sexo?>" class="ajuste" readonly>
                </td>
                </td>
            </tr>
            <tr>
                <td class="izq">Nombre: </td>
                <input type="hidden" name="txNombre" value="<?php echo $nom ?>">
                <input type="hidden" name="txApellidos" value="<?php echo $apellidos ?>">
                <td colspan="3"><input type="text" id="txNombre" value="<?php echo $nombreCompleto?>"
                required placeholder="Nombre(s)         Apellido paterno       Apellido materno" class="ajuste" readonly></td>
            </tr>
            <tr>
                <td class="der">R.F.C: </td>
                <td><input type="text" name="rfc" id="rfc" required value="<?php echo $rfc ?>"
                class="ajuste" placeholder="12 o 13 cáracteres" readonly></td>
                <td class="der">CURP: </td>
                <td><input type="text" name="curp" id="curp" required value="<?php echo $curp?>"
                class="ajuste" placeholder="16 cáracteres" readonly></td>
            </tr>
            <tr>
                <td class="izq">Correo electrónico: </td>
                <td colspan="3"><input type="email" name="correoElectronico" id="correoElectronico" value="<?php echo $correo?>"
                required placeholder="ejemplo@dominio.com-es-mx" class="ajuste" readonly></td>
            </tr>
            <tr>
                <td class="izq">Grado máximo de estudios: </td>
                <td colspan="3"><input type="text" name="gradoMaximoE" id="gradoMaximoE" value="<?php echo $estudios?>"
                required class="ajuste"
                placeholder="Ejemplo: Licenciatura, Maestria, Doctorado, Especialidad" readonly></td>
            </tr>
            <tr>
                <td class="izq">Nombre de la carrera: </td>
                <td colspan="3"><input type="text" name="nombreCarrera" id="nombreCarrera" value="<?php echo $nombreCarrera?>"
                required class="ajuste" readonly></td>
            </tr>
            <tr>
                <td colspan="4" class="negrita">DATOS LABORALES</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3"><input type="radio" name="rdDir" value="rdDirectivo" checked>
                <label for="rdDirectivo">Directivo</label>
                <input type="radio" name="rdDir" value="rdApoyo" >
                <label for="rdApoyo">Apoyo a la educación o docente con actividades administrativas</label>
                </td>
            </tr>
            <tr>
                <td class="izq">Instituto tecnológico o centro:</td>
                <td colspan="3"><input type="text" name="institutoToC" id="institutoToC" 
                value="<?php echo $I?>" readonly class="ajuste" maxlength="200"></td>
            </tr>
            <tr>
                <td class="izq">Área de adscripción:</td>
                <td colspan="3"><input type="text" name="areaAdscripcion" id="areaAdscripcion" 
                value="<?php echo $area?>" required readonly class="ajuste"></td>
            </tr>
            <tr>
                <td class="izq">Puesto que desempeña:</td>
                <td colspan="3"><input type="text" name="puestoDesempena" id="puestoDesempena" 
                value="<?php echo $puesto?>" required readonly class="ajuste"></td>
            </tr>
            <tr>
                <td class="izq">Nombre del jefe inmediato:</td>
                <td colspan="3"><input type="text" name="nombreJefe" id="nombreJefe" 
                value="<?php echo $jefe?>" required readonly class="ajuste"></td>
            </tr>
            <tr>
                <td class="der">Teléfono oficial:</td>
                <td><input type="tel" name="telefonoOficial" id="telefonoOficial" maxlength="10" 
                value="<?php echo $telefono?>" class="ajuste" readonly placeholder="10 dígitos"></td>
                <td class="der" >Ext.:</td>
                <td><input type="tel" name="ext" id="ext" maxlength="10" class="ajuste" 
                value="<?php echo $ext?>" readonly placeholder="10 dígitos"></td>
            </tr>
            <tr>
                <td class="der">Horario:</td>
                <td colspan="2" class="der"><input type="text" name="txHorarioL" id="txHorarioL" class="ajuste" 
                value="<?php echo $hrio?>" readonly placeholder="Ejemplo: 00:00 a.m. a 00:00 p.m"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="submit" name="btnContinuar" id="btnContinuar" 
                    value="Registrar" class="configBoton">
                &nbsp; <input type="button" name="btnSalir" id="btnSalir" onclick="location.href='CActivos.php'"
                    value="Salir" class="configBoton">
                </td>
                
            </tr>
        </table>
        </form>
    </section>
    <footer>
        <small>
            Tecnológico Nacional de México <br> Instituto Tecnológico de Huatabampo
            <br>2021 Todos los derechos reservados
        </small>
    </footer>
</body>
</html>