<?php
    include 'conn.php';
    $user = $_POST['txUser'];
    $sql = "SELECT Pass FROM respaldocontra WHERE User = '$user'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($result))
    {
        $pass = $row['Pass'];
        $sql = "UPDATE usuarios SET Contrasena = '$pass' WHERE Usuario = '$user'";
        mysqli_query($conn, $sql);
        echo 1;
    }
    else
        echo 2;
?>