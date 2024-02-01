<?php
include 'session.php';
include 'conn.php';
#if (isset($_POST['clave']))
$clave = $_POST['clave'];
$user = $_SESSION["user"];
    $sql = "SELECT Nombre, Apellidos, RFC, CURP, Correo FROM usuarios WHERE Usuario = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) 
    {
        $nom = $row["Nombre"];
        $apellidos = $row["Apellidos"];
        $rfc = $row["RFC"];
        $curp = $row["CURP"];
        $correo = $row["Correo"];
        $nombreCompleto = $nom." ".$apellidos;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor | Registrar CVU</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});
</script>
</head>

<body>
<nav><span style="float: left;"><b><?php echo $nombre ?> </b></span><a href="logout.php" class="der"><b>Cerrar sesión</b></a></nav>
    <header>
        <img src="header_ithua.png" width="100%">
        <br>
        <span class = "Titulos"><b>Sistema de Administración y Resguardo Documental de Formación Profesional y Docente</b></span>
</header>
    <section>
        <form name="fCVU" id="fCVU" method="POST" action="CVU.php">
        <input type="hidden" name="clave" value="<?php echo $clave ?>">
        <table class="ajustetablas2">
            <tr>
                <td colspan="5">
                    <h1> FORMATO CURRICULUM VITAE DEL INSTRUCTOR </h1>
                    <h2> M00-SC-029-A01</h2>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="negrita">1. DATOS PERSONALES</td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Nombre:</td>
                <td><input type="text" name="txNombre" id="txNombre" required class="ajuste" 
                placeholder="Nombre(s)   Apellidos" value="<?php echo $nombreCompleto?>"></td>
                <td class="negrita">Fecha de nacimiento:</td>
                <td><input type="date" name="txNacimiento" id="txNacimiento" required 
                class="ajuste"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">CURP:</td>
                <td ><input type="text" name="txCurp" id="txCurp" required class="ajuste" 
                placeholder="16 cáracteres" value="<?php echo $curp ?>"></td>
                <td class="negrita">RFC:</td>
                <td ><input type="text" name="txRfc" id="txRfc" required class="ajuste" 
                placeholder="12 o 13 cáracteres" value="<?php echo $rfc?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Télefono de contacto:</td>
                <td><input type="tel" name="txTelefono" id="txTelefono" required class="ajuste"
                    placeholder="10 dígitos"></td>
                <td class="negrita">Correo electrónico:</td>
                <td><input type="email" name="txEmail" id="txEmail" required class="ajuste"
                    placeholder="ejemplo@dominio.com-edu-es" value="<?php echo $correo?>"></td>
            </tr>
            <tr>
            <td colspan="5" class="negrita">2. FORMACIÓN ACADÉMICA</td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Formación académica</td>
                <td class="negrita">Institución</td>
                <td class="negrita">Titulación</td>
                <td class="negrita">Cédula profesional</td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Licenciatura</td>
                <td><input type="text" name="txLicenciaturaI" id="txLicenciaturaI" class="ajuste"></td>
                <td><input type="text" name="txLicenciaturaT" id="txLicenciaturaT" class="ajuste"></td>
                <td><input type="text" name="txLicenciaturaCP" id="txLicenciaturaCP" 
                    class="ajuste" placeholder="8 dígitos" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Maestría</td>
                <td><input type="text" name="txMaestriaI" id="txMaestriaI" class="ajuste"></td>
                <td><input type="text" name="txMaestriaT" id="txMaestriaT" class="ajuste"></td>
                <td><input type="text" name="txMaestriaCP" id="txMaestriaCP" 
                    class="ajuste" placeholder="8 dígitos" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Doctorado</td>
                <td><input type="text" name="txDoctoradoI" id="txDoctoradoI" class="ajuste"></td>
                <td><input type="text" name="txDoctoradoT" id="txDoctoradoT" class="ajuste"></td>
                <td><input type="text" name="txDoctoradoCP" id="txDoctoradoCP" 
                    class="ajuste" placeholder="8 dígitos" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Especialidad</td>
                <td><input type="text" name="txEspecialidadI" id="txEspecialidadI" class="ajuste"></td>
                <td><input type="text" name="txEspecialidadT" id="txEspecialidadT" class="ajuste"></td>
                <td><input type="text" name="txEspecialidadCP" id="txEspecialidadCP"  
                    class="ajuste" placeholder="8 dígitos" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="2" class="negrita">Otros estudios</td>
                <td><input type="text" name="txOtrosI" id="txOtrosI"  class="ajuste"></td>
                <td><input type="text" name="txOtrosT" id="txOtrosT"  class="ajuste"></td>
                <td><input type="text" name="txOtrosCP" id="txOtrosCP" 
                    class="ajuste" placeholder="8 dígitos" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="5" class="negrita">3. EXPERIENCIA LABORAL</td>
            </tr>
            <tr>
                <td class="negrita">No.</td>
                <td class="negrita ">Puesto</td>
                <td class="negrita">Empresa</td>
                <td class="negrita">Permanencia</td>
                <td class="negrita">Actividades laborales</td>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text" name="txPuesto1" id="txPuesto1" class="ajuste"></td>
                <td><input type="text" name="txEmpresa1" id="txEmpresa1" class="ajuste"></td>
                <td><input type="text" name="txPermanencia1" id="txPermanencia1" class="ajuste"></td>
                <td><input type="text" name="txActividades1" id="txActividades1" class="ajuste"></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="text" name="txPuesto2" id="txPuesto2" class="ajuste"></td>
                <td><input type="text" name="txEmpresa2" id="txEmpresa2" class="ajuste"></td>
                <td><input type="text" name="txPermanencia2" id="txPermanencia2" class="ajuste"></td>
                <td><input type="text" name="txActividades2" id="txActividades2" class="ajuste"></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="text" name="txPuesto3" id="txPuesto3" class="ajuste"></td>
                <td><input type="text" name="txEmpresa3" id="txEmpresa3" class="ajuste"></td>
                <td><input type="text" name="txPermanencia3" id="txPermanencia3" class="ajuste"></td>
                <td><input type="text" name="txActividades3" id="txActividades3" class="ajuste"></td>
            </tr>
            <tr >
                <td colspan="5" class="negrita">4. EXPERIENCIA DOCENTE</td>
            </tr>
            <tr>
                <td class="negrita">No.</td>
                <td colspan="2" class="negrita">Materia</td>
                <td colspan="2" class="negrita">Periodo</td>
            </tr>
            <tr>
                <td>1</td>
                <td colspan="2"><input type="text" name="txMateria1" id="txMateria1" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txPeriodo1" id="txPeriodo1" class="ajuste"></td>
            </tr>
            <tr>
                <td>2</td>
                <td colspan="2"><input type="text" name="txMateria2" id="txMateria2" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txPeriodo2" id="txPeriodo2" class="ajuste"></td>
            </tr>
            <tr>
                <td>3</td>
                <td colspan="2"><input type="text" name="txMateria3" id="txMateria3" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txPeriodo3" id="txPeriodo3" class="ajuste"></td>
            </tr>
            <tr>
                <td colspan="5" class="negrita">5. PRODUCTOS ACADÉMICOS</td>
            </tr>
            <tr>
                <td class="negrita">No.</td>
                <td class="negrita">Actividad/Producto</td>
                <td colspan="2" class="negrita">Descripción</td>
                <td class="negrita">Fecha</td>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text" name="txActividad1" id="txActividad1" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txDescripcion1" id="txDescripcion1" class="ajuste"></td>
                <td><input type="date" name="txFecha1" id="txFecha1" class="ajuste"></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="text" name="txActividad2" id="txActividad2" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txDescripcion2" id="txDescripcion2" class="ajuste"></td>
                <td><input type="date" name="txFecha2" id="txFecha2" class="ajuste"></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="text" name="txActividad3" id="txActividad3" class="ajuste"></td>
                <td colspan="2"><input type="text" name="txDescripcion3" id="txDescripcion3" class="ajuste"></td>
                <td><input type="date" name="txFecha3" id="txFecha3" class="ajuste"></td>
            </tr>
            <tr>
                <td colspan="5" class="negrita">6. PARTICIPACIÓN COMO INSTRUCTOR</td>
            </tr>
            <tr>
                <td class="negrita">No.</td>
                <td class="negrita">TÍTULO</td>
                <td class="negrita">Institución, Empresa <br>u Organización</td>
                <td class="negrita">Duración(horas)</td>
                <td class="negrita">Fecha</td>
            </tr>
            <tr>
                <td>1</td>
                <td><input type="text" name="txTitulo1" id="txTitulo1" class="ajuste"></td>
                <td><input type="text" name="txIEO1" id="txIEO1" class="ajuste"></td>
                <td><input type="number" name="txDuracion1" id="txDuracion1" class="ajuste"></td>
                <td><input type="date" name="txFe1" id="txFe1" class="ajuste"></td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="text" name="txTitulo2" id="txTitulo2" class="ajuste"></td>
                <td><input type="text" name="txIEO2" id="txIEO2" class="ajuste"></td>
                <td><input type="number" name="txDuracion2" id="txDuracion2" class="ajuste"></td>
                <td><input type="date" name="txFe2" id="txFe2" class="ajuste"></td>
            </tr>
            <tr>
                <td>3</td>
                <td><input type="text" name="txTitulo3" id="txTitulo3" class="ajuste"></td>
                <td><input type="text" name="txIEO3" id="txIEO3" class="ajuste"></td>
                <td><input type="number" name="txDuracion3" id="txDuracion3" class="ajuste"></td>
                <td><input type="date" name="txFe3" id="txFe3" class="ajuste"></td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="submit" name="btnRegistrar" id="btnRegistrar" 
                    class="configBoton" value="Registrar">&nbsp;&nbsp;
                    <input type="button" name="btnCancelar" id="btnCancelar"
                    class="configBoton" value="Cancelar" onclick="location.href='CActivos.php'">
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