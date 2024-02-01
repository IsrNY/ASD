<?php
include 'conn.php';

if($conn)
{
    $user = $_POST["txUser"];
    $nombre = $_POST["txNom"];
    $apellidos = $_POST["txApll"];
    $funcion = $_POST["txFuncion"];
    

    $sql = "SELECT Usuario FROM usuarios WHERE Usuario = '".$user."';";

    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        $sql = "UPDATE usuarios SET Nombre = '$nombre', Apellidos = '$apellidos', Funcion = '$funcion' WHERE Usuario = '$user'";
        $query = mysqli_query($conn, $sql);
        if ($query)
            echo 1;
        else
            echo 2;
    }
}
    else
    {
        die("Conexión fallida: ".mysqli_connect_error());
        echo 3;
    }
?>