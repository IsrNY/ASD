<?php
include 'session.php';
include 'conn.php';
$user = $_SESSION["user"];
if ($conn) {
    $sql = "SELECT InstCent, Area, Puesto, Jefe, Telefono, Ext, Horario FROM usuarios WHERE Usuario = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $Inst = $row['InstCent'];
        $area = $row['Area'];
        $puesto = $row['Puesto'];
        $jefe = $row['Jefe'];
        $telefono = $row['Telefono'];
        $ext = $row['Ext'];
        $horario = $row['Horario'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Datos laborales</title>
    <link rel="stylesheet" href="css/general.css">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/adminDL.js" type="text/javascript"></script>
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
            <form name="adminDL" id="adminDL">
            <div class="contenedorGral">
            <input type="hidden" name="txUser" id="txUser" value="<?php echo $user?>">
                <table>
                <tr>
                            <td class="negrita" colspan="4">Administración de datos laborales</td>
                        </tr>
                        <tr>
                            <td class="negrita" colspan="2">Instituto Tecnológico o Centro</td>
                            <td class="negrita">Área de adscripción</td>
                            <td class="negrita">Puesto que desempeña</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="txIns" id="txIns" value="<?php echo $Inst ?>"  class="ajuste"></td>
                            <td><input type="text" name="txArea" id="txArea" value="<?php echo $area?>" class="ajuste"></td>
                            <td><input type="text" name="txPuesto" id="txPuesto" value="<?php echo $puesto?>" class="ajuste"></td>
                        </tr>
                        <tr>
                        <td class="negrita">Nombre del jefe inmediato</td>
                            <td class="negrita">Telefono oficial</td>
                            <td class="negrita">Ext.</td>
                            <td class="negrita">Horario</td>
                        </tr>
                        <tr>
                        <td><input type="text" name="txJefe" id="txJefe" value="<?php echo $jefe?>" class="ajuste" placeholder=""></td>
                            <td><input type="text" name="txTelefono" id="txTelefono" value="<?php echo $telefono?>" class="ajuste"></td>
                            <td><input type="text" name="txExt" id="txExt" value="<?php echo $ext?>" class="ajuste"></td>
                            <td><input type="text" name="txHrio" id="txHrio" value="<?php echo $horario?>" class="ajuste"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="text" name="txUser" id="txUser" value="<?php echo $user?>" hidden>
                                <input type="button" name="btnRegistroU" id="btnRegistroU" value="Guardar" 
                                class="configBoton" onclick="guardarDL()">
                                <input type="button" name="btnSalirU" id="btnSalirU" value="Salir"
                                class="configBoton" onclick="location.href='docentes.php'">
                            </td>
                        </tr>
                </table>
            </div>
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