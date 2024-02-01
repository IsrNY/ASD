<?php
include 'session.php';
include 'conn.php';
$clave=$_GET["clave"];
$user = $_SESSION["user"];
if ($conn) {
    $sql = "SELECT NombreCurso, Instructor, Periodo, Horario, Horas FROM cursosactivos WHERE Clave = '$clave'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $nombreCurso = $row["NombreCurso"];
        $horas = $row["Horas"];
    }
    $sql = "SELECT Nombre, Apellidos, RFC, CURP, Correo, Estudios, NombreCarrera, Sexo FROM usuarios WHERE Usuario = '$user'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $nom = $row["Nombre"];
        $apellidos = $row["Apellidos"];
        $rfc = $row["RFC"];
        $nombreCompleto = $apellidos." ".$nom;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor | Registrar ficha técnica</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $("input").keypress(function(e) {
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
            <form name="fFichaT" id="fFichaT" action="ficha.php" method="POST">
                <table class="ajustetablas2">
                    <tr>
                        <td class="negrita" colspan="4">FICHA TÉCNICA DEL SERVICIO DE ACTUALIZACIÓN PROFESIONAL Y 
                            FORMACIÓN DOCENTE<br>M00-SC-029-A02</td>
                    </tr>
                    <tr>
                        <td class="izq" colspan="2"><b>Instituto Tecnológico, Centro o Unidad</b></td>
                        <td colspan="2"><input type="text" name="txInst" id="txInst" class="ajuste"
                        placeholder="Nombre completo del Instituto Tecnológico, Centro o Unidad."></td>
                    </tr>
                    <tr>
                        <td class="izq" colspan="2"><b>Nombre del servicio</b></td>
                        <td colspan="2"><input type="text" name="txNomSer" id="txNomSer" value="<?php echo $nombreCurso?>"
                        class="ajuste" placeholder="Coloque el nombre con el que se registra el curso."></td>
                    </tr>
                    <tr>
                        <td class="izq" colspan="2"><b>Instructor</b></td>
                        <td colspan="2"><input type="text" name="txInstr" id="txInstr" value="<?php echo $nombreCompleto?>" 
                        class="ajuste" placeholder="Coloque su nombre iniciando por apellidos paterno, materno y nombre(s)."></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Introducción:</b></td>
                        <td colspan="2"><textarea name="txIntrod" id="txIntrod" style="height: 70px;" 
                        class="ajuste taB" placeholder="En un máximo de 250 palabras dé una breve introducción del curso."></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Justificación:</b></td>
                        <td colspan="2"><textarea name="txJustificacion" id="txJustificacion" style="height: 70px;"
                        class="ajuste taB" placeholder="Describir las razones que sustentan la realización de la capacitación."></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Objetivo general:</b></td>
                        <td colspan="2"><textarea name="txObjetivoG" id="txObjetivoG" style="height: 70px;"
                        class="ajuste taB" placeholder="Describir la finalidad del servicio"></textarea></td>
                    </tr>
                    <tr>
                        <td class="negrita" colspan="2"><b>Descripción del servicio:</b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="der" colspan="2"><b>Especificar tipo de servicio:</b></td>
                        <td colspan="2"><input type="text" name="txTSer" id="txTSer" 
                        class="ajuste" placeholder="Especificar si se trata de un curso, curso-taller, taller,diplomado, serie de platicas..."></td>
                    </tr>
                    <tr>
                        <td class="der" colspan="2"><b>Duración en horas del curso:</b></td>
                        <td colspan="2"><input type="text" name="txDur" id="txDur" value="<?php echo $horas." horas"?>"
                        class="ajuste" placeholder="Colocar la duración total del curso en horas."></td>
                    </tr>
                    <tr>
                        <td class="der" colspan="2"><B>Contenido temático del curso:</B></td>
                        <td colspan="2"><b>Temas y subtemas que se abordarán en el servicio de capacitación</b></td>
                    </tr>
                    <tr>
                        <td class="negrita" colspan="2">Temas/Subtemas</td>
                        <td class="negrita">Tiempo programado (Horas)</td>
                        <td class="negrita">Actividades de aprendizaje</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="txTemSub1" id="txTemSub1" class="ajuste"></td>
                        <td><input type="text" name="txTP1" id="txTP1" class="ajuste"></td>
                        <td ><input type="text" name="txAApr1" id="txAApr1" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="txTemSub2" id="txTemSub2" class="ajuste"></td>
                        <td><input type="text" name="txTP2" id="txTP2" class="ajuste"></td>
                        <td><input type="text" name="txAApr2" id="txAApr2" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="txTemSub3" id="txTemSub3" class="ajuste"></td>
                        <td><input type="text" name="txTP3" id="txTP3" class="ajuste"></td>
                        <td><input type="text" name="txAApr3" id="txAApr3" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="txTemSub4" id="txTemSub4" class="ajuste"></td>
                        <td><input type="text" name="txTP4" id="txTP4" class="ajuste"></td>
                        <td><input type="text" name="txAApr4" id="txAApr4" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td class="der" colspan="2"><b>Elementos didácticos para el desarrollo del curso:</b></td>
                        <td colspan="2"><textarea name="txEDC" id="txEDC" style="height: 40px;" 
                        class="ajuste taB" placeholder="Describir los elementos de apoyo que requerirá el instructor para la realización del servicio (Computadora, Software, Proyector, entre otros)."></textarea></td>
                    </tr>
                    <tr>
                        <td class="der" colspan="2"><b>Criterio de evaluación:</b></td>
                        <td colspan="2"><b>Escribir 3 criterios</b></td>
                    </tr>
                    <tr>
                        <td class="negrita" >No.</td>
                        <td class="negrita" >Criterio</td>
                        <td class="negrita">Valor (%)</td>
                        <td class="negrita">Instrumento de evaluación</td>
                    </tr>
                    <tr>
                        <td class="negrita">1</td>
                        <td><input type="text" name="txCriterio1" id="txCriterio1" class="ajuste"></td>
                        <td><input type="text" name="txValor1" id="txValor1" class="ajuste" placeholder="Especificar sin %"></td>
                        <td><input type="text" name="txInstrumento1" id="txInstrumento1" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td class="negrita">2</td>
                        <td><input type="text" name="txCriterio2" id="txCriterio2" class="ajuste"></td>
                        <td><input type="text" name="txValor2" id="txValor2" class="ajuste" placeholder="Especificar sin %"></td>
                        <td><input type="text" name="txInstrumento2" id="txInstrumento2" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td class="negrita">3</td>
                        <td><input type="text" name="txCriterio3" id="txCriterio3" class="ajuste"></td>
                        <td><input type="text" name="txValor3" id="txValor3" class="ajuste" placeholder="Especificar sin %"></td>
                        <td><input type="text" name="txInstrumento3" id="txInstrumento3" class="ajuste"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="der"><b>Competencias a desarrollar:</b></td>
                        <td colspan="2"><textarea name="txCompDes" id="txCompDes" style="height: 70px;"
                        class="ajuste taB" placeholder="Describir las competencias que se pretenden desarrollar con el desarrollo del servicio."></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="der"><b>Fuentes de información:</b></td>
                        <td colspan="2"><textarea name="txFuentesI" id="txFuentesI" style="height: 100px;"
                        class="ajuste taB" placeholder="Colocar la bibliografía en formato APA para la elaboración y desarrollo del servicio."></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <input type="hidden" name="txN" id="txN" value="<?php echo $nom." ".$apellidos?>">
                            <input type="hidden" name="txCl" id="txCl" value="<?php echo $clave?>">
                            <input type="submit" value="Registrar Ficha" class="configBoton ">
                            <input type="button" value="Cancelar" class="configBoton" onclick="location.href='CActivos.php'">
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