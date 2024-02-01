<?php
include 'session.php';
$usuario = $_GET["usuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes | Cambio de contraseña</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/Contras.js" type="text/javascript"></script>
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
        <form name="fCContra" id="fCContra">
        <div class="contenedorGral">
            <table>
                <tr>
                    <td class="negrita" colspan="2">Cambiar contraseña</td>
                </tr>
                <tr>
                    <td>Contraseña actual</td>
                    <td><input type="password" name="txContraAnterior" id="txContraAnterior" class="ajuste"
                        placeholder="Actual contraseña"></td>
                </tr>
                <tr>
                    <td>Nueva contraseña</td>
                    <td><input type="password" name="txContraNueva" id="txContraNueva" class="ajuste"
                        placeholder="Nueva contraseña"></td>
                </tr>
                <tr>
                    <td>Confirmar nueva contraseña</td>
                    <td><input type="password" name="txConfirmContra" id="txConfirmContra" class="ajuste"
                        placeholder="Nueva contraseña"></td>
                </tr>
                <tr>
                    <td colspan="2"> 
                        <input type="button" name="btnCContra" id="btnCContra" value="Cambiar"
                        class="configBoton" style="width:45%;" onclick="cambiarContra()">
                        <input type="button" value="Cancelar" onclick="location.href='docentes.php'" 
                        class="configBoton"style="width:50%;">
                    </td> 
                </tr>
            </table>
            <input type="text" name="txUs" id="txUs" value="<?php echo $usuario?>"hidden>
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