<?php
include 'conn.php';

if($conn)
{
    $user = $_POST["txUser"];
    $pass = $_POST["txPassword"];
    $nombre = $_POST["txNom"];
    $apellidos = $_POST["txApll"];
    $funcion = $_POST["txFuncion"];
    

    $sql = "SELECT Usuario FROM usuarios WHERE Usuario = '".$user."';";

    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        echo 2;
    }
    else
    {
        $pass = md5($pass);
        $sql = "INSERT INTO usuarios(Usuario,Contrasena,Nombre,Apellidos,Funcion,CVU) 
        VALUES ('$user','$pass','$nombre','$apellidos','$funcion','No');";
        $query = mysqli_query($conn,$sql);
        if($query)
        {
            $sql = "INSERT INTO respaldocontra(User, Pass) VALUES('$user', '$pass')";
            mysqli_query($conn, $sql);
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