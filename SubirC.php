<?php
include 'conn.php';
session_start();
$clave = $_POST['clave'];
for ($i = 0; $i < count($_SESSION['rfcc']); $i++) {
    $rfc = $_SESSION['rfcc'][$i];
    $fichero = $_FILES[$rfc . 'File'];
    $name = $fichero['name'];
    $nombre = 'Constancia ' . $rfc . ' ' . $clave . '.pdf';
    if ($name != null) {
        move_uploaded_file($fichero['tmp_name'], './Archivos/Constancias/' . $nombre);
        $sql = "UPDATE cursoscompletados SET constancia = '$nombre' WHERE RFCparticipante = '$rfc' AND claveCurso = '$clave'";
        Mysqli_query($conn, $sql);
    }
}
echo 1;
?>