<?php
include 'conn.php';
if($conn)
{
    $Us = $_POST["txUs"];
    $contraAnterior = $_POST["txContraAnterior"];
    $contraNueva = $_POST["txContraNueva"];
    $confirmContra = $_POST["txConfirmContra"];
    
    $sql = "SELECT Contrasena FROM usuarios WHERE Usuario = '$Us';";
    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        if($row['Contrasena']== md5($contraAnterior))
        {
            if($contraNueva==$confirmContra)
            {
                $contraNueva = md5($contraNueva);
                $sql = "UPDATE usuarios SET Contrasena = '$contraNueva' WHERE Usuario = '$Us'";
                $query = mysqli_query($conn, $sql);
                if ($query)
                echo 1;
            } 
            else
            {
                echo 2;
            }
        }
        else
        {
            echo 3;
        }
    }
}
else
{
    die("Conexión fallida: ".mysqli_connect_error());
    echo 4;
}
?>