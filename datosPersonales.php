<?php
include 'session.php';
include 'conn.php';
$user = $_SESSION["user"];
if ($conn) {
    $sql = "SELECT RFC, CURP, Correo, Estudios, NombreCarrera, Sexo FROM usuarios WHERE Usuario = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $rfc = $row['RFC'];
        $curp = $row['CURP'];
        $correo = $row['Correo'];
        $estudios = $row['Estudios'];
        $carrera = $row['NombreCarrera'];
        $sexo = $row["Sexo"];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Datos personales</title>
    <link rel="stylesheet" href="css/general.css">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/adminDatosP.js" type="text/javascript"></script>
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
            <form name="adminDP" id="adminDP">
            <div class="contenedorGral">
            <input type="hidden" name="txUser" id="txUser" value="<?php echo $user?>">
                <table>
                <tr>
                            <td class="negrita" colspan="3">Administración de datos personales</td>
                        </tr>
                        <tr>
                            <td class="negrita">RFC</td>
                            <td class="negrita">CURP</td>
                            <td class="negrita">Correo electrónico</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="txRFC" id="txRFC" value="<?php echo $rfc ?>"  class="ajuste"></td>
                            <td><input type="text" name="txCURP" id="txCURP" value="<?php echo $curp ?>" class="ajuste"></td>
                            <td><input type="text" name="txCorreo" id="txCorreo" value="<?php echo $correo?>" class="ajuste"></td>
                        </tr>
                        <tr>
                        <td class="negrita">Grado máximo de estudios</td>
                            <td class="negrita">Nombre de la carrera</td>
                            <td class="negrita">Sexo</td>
                        </tr>
                        <tr>
                            <td><select type="text" name="txEstudios" id="txEstudios" class="ajuste">
                            <?php
                            switch($estudios)
                            {
                                case "Licenciatura":
                            ?>
                            <option value="Licenciatura" selected>Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Especialidad">Especialidad</option>
                            <?php
                                    break;
                                    case "Maestría":
                            ?>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestría" selected>Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Especialidad">Especialidad</option>
                            <?php
                                    break;
                                    case "Doctorado":
                            ?>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado" selected>Doctorado</option>
                            <option value="Especialidad">Especialidad</option>
                            <?php
                                    break;
                                    case "Especialidad":
                            ?>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Especialidad" selected>Especialidad</option>
                            <?php
                                    break;
                                    default:
                            ?>
                            <option value="Licenciatura" selected>Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Especialidad">Especialidad</option>
                            <?php
                                    break;
                            }
                            ?>
                            </select>
                            </td>
                            <td><input type="text" name="txCarrera" id="txCarrera" value="<?php echo $carrera?>" class="ajuste"></td>
                            <td><select name="txSexo" id="txSexo" class="ajuste">
                            <?php
                            if ($sexo == "Hombre") 
                            {
                            ?>
                                        <option value="Hombre" selected>Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Indefinido">Indefinido</option>
                            <?php
                            }
                            else if ($sexo == "Mujer") 
                            {
                            ?>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer" selected>Mujer</option>
                                        <option value="Indefinido">Indefinido</option>
                            <?php
                            }
                            else 
                            {
                            ?>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Indefinido" selected>Indefinido</option>
                            <?php
                            }
                            ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="button" name="btnRegistroU" id="btnRegistroU" value="Guardar" 
                                class="configBoton" onclick="guardar()">
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