<?php
include 'conn.php';
session_start();
if($conn)
{
    $user = $_POST['user'];
    $pass = $_POST['Pass'];

    $sql = "SELECT Nombre,Apellidos,Usuario,Contrasena,RFC,Funcion FROM usuarios WHERE Usuario = '".$user."';";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result))
    {
        if($row["Contrasena"] == md5($pass))
        {
            $_SESSION["Usuario"] = $row["Usuario"];
            $_SESSION["nombre"] = $row["Nombre"]." ". $row["Apellidos"];
            $_SESSION["user"] = $row["Usuario"];
            $_SESSION["rfc"] = $row["RFC"];
            $_SESSION["funcion"] = $row["Funcion"];
            if ($row["Funcion"] == "Administrador")
                echo 1;
            else
                echo 2;
        }
        else
        {
            echo 4;
        }
    }
    else
        {
            echo 5;
        }
}
else
{
    die("Conexion fallida: ".mysqli_connect_error());
    echo 6;
}

?>


