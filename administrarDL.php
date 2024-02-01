<?php
include 'conn.php';

if($conn)
{
    $usuario = $_POST['txUser'];
    $Inst = $_POST['txIns'];
    $area = $_POST['txArea'];
    $puesto =$_POST['txPuesto'];
    $jefe = $_POST['txJefe'];
    $telefono = $_POST['txTelefono'];
    $ext = $_POST['txExt'];
    $horario = $_POST['txHrio'];

    $sql = "SELECT Usuario FROM usuarios WHERE Usuario = '$usuario';";

    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        $sql = "UPDATE usuarios SET InstCent = '$Inst', Area = '$area', Puesto ='$puesto', Jefe = '$jefe', Telefono = '$telefono', Ext = '$ext', Horario = '$horario' WHERE Usuario = '$usuario'";
        $query = mysqli_query($conn, $sql);
        if ($query)
            echo 1;
    }
}
    else
    {
        die("Conexión fallida: ".mysqli_connect_error());
        echo 3;
    }
?>