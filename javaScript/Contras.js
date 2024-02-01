function cambiarContra()
{
    var ok= true;
    var Us = document.getElementById("txUs");
    if(Us=="")
    {
        ok=false;
    }
    var ContraAnt = document.getElementById("txContraAnterior").value;
    if(ContraAnt=="")
    {
        ok=false;
    }
    var ContraNueva = document.getElementById("txContraNueva").value;
    if(ContraNueva =="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('fCContra'));
        $.ajax({
            type: "POST",
            url: "cContra.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) 
                {
                location.href="docentes.php";
                alert("Contraseña actualizada con éxito");
                }
                if(res==2)
                alert("El texto de las nuevas contraseñas no coincide, verifique ambas entradas de texto")
                if(res==3)
                alert("La contraseña actual proporcionada no coincide con los registros en la base de datos, intente corregirla");
                if(res==4)
                alert("Conexión fallida");
            }
        });
    }
    else
    {
        alert("Para cambiar la contraseña debe proporcionar la contraseña con la que ingresó y posteriormente proporcionar una contraseña de reemplazo.");
    }
}