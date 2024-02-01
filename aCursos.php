<?php
include 'conn.php';

if($conn)
{
    $clave = $_POST["txClave"];
    $nombreS = $_POST["txNombreS"];
    $estado = $_POST["txEst"];
    $objetivo = $_POST["txObjetivo"];
    $periodo = $_POST["txPeriodo"];
    $lugar = $_POST["txLugar"];
    $horas =$_POST["txNumH"];
    $instructor = $_POST["txInstructor"];
    $rfc = $_POST["txRFC"];
    $dirigido = $_POST["txDirigido"];
    $preRR = $_POST["txPre"];
    $horario = $_POST["txHorarioC"];
    if($estado =="")
    {
        $estado = 'En espera';
    }

    $sql = "SELECT Clave FROM cursosactivos WHERE Clave = '$clave';";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_array($result))
    {
        echo 2;
    }
    else
    {
        $sql = "INSERT INTO cursosactivos (Clave,NombreCurso,Objetivo,Periodo,Lugar,Horas,Instructor,RFC,DirigidoA,PreRR,Horario,Estado,fichaTecnica) VALUES ('$clave','$nombreS','$objetivo','$periodo','$lugar','$horas','$instructor','$rfc','$dirigido','$preRR','$horario','$estado','No');";
        $query = mysqli_query($conn,$sql);
        if($query)
        {
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
