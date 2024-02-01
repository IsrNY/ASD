function principal() {
    var ok = true;
    var User = document.getElementById("user").value;
    if (User == "") {
        ok = false;
    }
    var Pass = document.getElementById("Pass").value;
    if (Pass == "") {
        ok = false;
    }
    if (ok) {
        var dataForm = new FormData(document.getElementById('LogIn'));
        $.ajax({
            type: "POST",
            url: "login.php",
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res);
                if (res == 1) {
                    location.href = "administrador.php";
                    alert("Bienvenido(a) administrador(a)");
                }
                if (res == 2) {
                    location.href = "docentes.php";
                    alert("Bienvenido(a), usuario(a)");
                }
                if (res == 4)
                    alert("Contraseña incorrecta");
                if (res == 5)
                    alert("Usuario incorrecto");
                if (res == 6)
                    alert("Conexión fallida");

            }
        });
    }
    else {
        alert("Campos vacios");
    }
}
function fecha() {
    var fecha = new Date();
    var month = fecha.getUTCMonth() + 1;
    var day = fecha.getUTCDay();
    var year = fecha.getUTCFullYear();
    var dat = day + "/" + month + "/" + year;
    document.getElementbyId("txFecha").value = dat;
    window.addEventListener("load", fecha, false);
}

