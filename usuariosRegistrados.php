<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Usuarios registrados</title>
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
            <div class="contenedorGral" style="max-height:340px; overflow-y:auto;">
                <table>
                    <tr>
                        <td class="negrita" colspan="5">Usuarios registrados</td>
                    </tr>
                    <tr>
                        <td class="negrita">Nombre</td>
                        <td class="negrita">Apellidos</td>
                        <td class="negrita">Usuario</td>
                        <td class="negrita">Función</td>
                    </tr>
                    <?php
                    include 'conn.php';
                    if ($conn) {
                        $sql = "SELECT Usuario, Contrasena, Nombre, Apellidos, Funcion,RFC,CURP,Correo,Estudios,NombreCarrera FROM usuarios";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['Funcion'] != 'Administrador') {
                    ?>
                                <tr>
                                    <td><?php echo $row["Nombre"] ?></td>
                                    <td><?php echo $row["Apellidos"] ?></td>
                                    <td><?php echo $row["Usuario"] ?></td>
                                    <td><?php echo $row["Funcion"] ?></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <input type="button" name="btnVolverUR" id="btnVolverUR" value="Volver" class="configBoton centro" onclick="location.href='administrarUsuarios.php'">
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