<?php
include 'conn.php';
session_start();

if($conn)
{
    $usuario = $_POST["txUser"];
    $rfc = $_POST["txRFC"];
    $qs = explode(' ', $rfc);
    $rfc = $qs[0];
    $curp = $_POST["txCURP"];
    $correo = $_POST["txCorreo"];
    $estudios = $_POST["txEstudios"];
    $carrera = $_POST["txCarrera"];
    $sexo = $_POST["txSexo"];

    $sql = "SELECT Usuario FROM usuarios WHERE Usuario = '$usuario';";

    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        $sql = "UPDATE usuarios SET RFC = '$rfc', CURP = '$curp', Correo = '$correo', Estudios = '$estudios', NombreCarrera = '$carrera', Sexo = '$sexo' WHERE Usuario = '$usuario'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION["rfc"] = $rfc;
            echo 1;
        }
    }
}
    else
    {
        die("Conexión fallida: ".mysqli_connect_error());
        echo 3;
    }
?>