<?php
include 'sessioni.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/index.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body class="index">
    <header>
        <img src="header_ithua.png" width="100%">
        <h1>Sistema de administración y resguardo documental de formación profesional y docente</h1>

    </header>
    <div class="INN">
    <section>
        <form id="LogIn" name="Inicio">
            <div class="ingresoT">
                <table>
                    <tr>
                        <td colspan="2" class="negrita">Ingresar datos de acceso</td>
                    </tr>
                    <tr>
                        <td class="textos">Usuario:</td>
                        <td><input type="text" name="user" id="user"  maxlength="100" 
                            placeholder="Ejemplo: RFC" class="ajuste">*</td>
                    </tr>
                    <tr>
                        <td class="textos">Contraseña:</td>
                        <td><input type="password" name="Pass" id="Pass"  maxlength="100"
                            placeholder="Ejemplo: CURP" class="ajuste">*</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" name="btnIngreso" id="btnIngreso" value="Ingresar" 
                            class="configBoton" onclick="principal()"></td>
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