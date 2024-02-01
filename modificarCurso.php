<?php
include 'conn.php';

if($conn)
{
    $clave = $_POST["txClave"];
    $estado = $_POST["txEst"];
    $nombreC = $_POST["txNombreS"];
    $objetivo = $_POST["txObjetivo"];
    $periodo = $_POST["txPeriodo"];
    $lugar = $_POST["txLugar"];
    $horas = $_POST["txNumH"];
    $instructor = $_POST["txInstructor"];
    $rfc = $_POST["txRFC"];
    $dirigidoA = $_POST["txDirigido"];
    $preRR = $_POST["txPre"];
    $horario = $_POST["txHorarioC"];
    

    $sql = "SELECT Clave FROM cursosactivos WHERE Clave = '$clave';";

    $result = mysqli_query($conn, $sql);
    if($row =mysqli_fetch_array($result))
    {
        $sql = "UPDATE cursosactivos SET NombreCurso = '$nombreC', Estado = '$estado', Objetivo = '$objetivo', Periodo = '$periodo', Lugar = '$lugar', Horas ='$horas', Instructor ='$instructor', RFC = '$rfc' , DirigidoA = '$dirigidoA', PreRR = '$preRR', Horario = '$horario' WHERE Clave = '$clave'";
        $query = mysqli_query($conn, $sql);
        if ($query)
            echo 1;
    }
}
else
{
    die("Conexión fallida: ".mysqli_connect_error());
    echo 2;
}
?>