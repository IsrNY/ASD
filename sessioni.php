<?php
function usuario_autenticado() {
    if (revisar_usuario()) {
        if ($_SESSION['funcion'] == "Administrador")
            header('location:administrador.php');
        else
            header('location:docentes.php');
    }
}

function revisar_usuario() {
return isset($_SESSION['funcion']);
}

session_start();
usuario_autenticado();
?>