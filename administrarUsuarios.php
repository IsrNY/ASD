<?php
include 'session.php';
include 'conn.php';
$usuario = "";
$contra = "";
$nomb = "";
$apellido = "";
$funcion = "";
$B = false;
if (isset($_POST['txUser'])) {
    $B = true;
    $usuario = $_POST['txUser'];
    $sql = "SELECT Usuario, Nombre, Apellidos, Funcion FROM usuarios WHERE Usuario = '$usuario'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $user = $row['Usuario'];
        $nomb = $row['Nombre'];
        $apellido = $row['Apellidos'];
        $funcion = $row['Funcion'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Administrar usuarios</title>
    <link rel="stylesheet" href="css/general.css">
    <script src="javaScript/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="javaScript/administrarUsuarios.js" type="text/javascript"></script>
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
    <nav><span style="float: left;"><?php echo $nombre ?> </span><a href="logout.php" class="der">Cerrar sesión</a></nav>
    <header>
        <img src="header_ithua.png" width="100%">
        <h1>Sistema de Administración y Resguardo Documental de Formación Profesional y Docente</h1>
    </header>
    <div class="INN">
        <section>
            <form method="POST" name="fAdmonUsuarios" id="fAdmonUsuarios">
                <div class="contenedorGral">
                    <table>
                        <tr>
                            <td class="negrita" colspan="5">Administración de usuarios</td>
                        </tr>
                        <tr>
                            <td class="negrita">Usuario</td>
                            <td class="negrita">Contraseña</td>
                            <td class="negrita">Nombre</td>
                            <td class="negrita">Apellidos</td>
                            <td class="negrita">Función</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="txUser" id="txUser" value="<?php echo $usuario ?>" required placeholder="RFC" class="ajuste"></td>
                            <td><input type="text" name="txPassword" id="txPassword" placeholder="CURP" class="ajuste"></td>
                            <td><input type="text" name="txNom" id="txNom" value="<?php echo $nomb ?>" class="ajuste"></td>
                            <td><input type="text" name="txApll" id="txApll" value="<?php echo $apellido ?>" class="ajuste" placeholder=""></td>
                            <td><select name="txFuncion" id="txFuncion" class="ajuste">
                                    <?php
                                    if ($B) {
                                        if ($funcion == "Interno") { ?>
                                            <option value="Interno" selected>Interno</option>
                                            <option value="Externo">Externo</option>
                                        <?php
                                        } else if ($funcion == "Externo") { ?>
                                            <option value="Interno">Interno</option>
                                            <option value="Externo" selected>Externo</option>
                                        <?php
                                        } else if ($funcion =="Administrador") { ?>
                                        <option value="Interno">Interno</option>
                                        <option value="Externo">Externo</option>
                                        <option value="Administrador" selected>Administrador</option>
                                        <?php
                                        } 
                                        }else { ?>
                                        <option value="Interno" selected>Interno</option>
                                        <option value="Externo">Externo</option>
                                    <?php
                                    } 
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="button" name="btnRegistroU" id="btnRegistroU" value="Registrar" class="configBoton" onclick="registrar()">
                                <input type="button" name="btnActualizarU" id="btnActualizarU" value="Actualizar" class="configBoton" onclick="actualizar()">
                                <input type="button" name="btnEliminarU" id="btnEliminarU" value="Eliminar" class="configBoton" onclick="eliminar()">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="submit" name="btnBuscarU" id="btnBuscarU" value="Buscar usuario" class="configBoton">
                                <input type="button" name="btnUsuariosR" id="btnUsuariosR" value="Usuarios registrados" class="configBoton" onclick="location.href='usuariosRegistrados.php'">
                                <input type="button" name="btnSalirU" id="btnSalirU" value="Salir" class="configBoton" onclick="location.href='administrador.php'">
                            </td>
                        </tr>
                        <tr>
                        <td colspan="5">
                        <input type="button" name="reinicio" id="reinicio" value="Reiniciar formulario" class="configBoton" onclick="limpiarFormulario()">
                        <?php
                                if (isset($_POST['txUser'])) {
                                ?>
                                    <input type="button" value="Restaurar Contraseña" class="configBoton" onclick="restaurarContra()">
                                <?php
                                }
                                ?>
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