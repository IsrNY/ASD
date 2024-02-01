function generarLista()
{
    var ok= true;
    var Clave = document.getElementById("txCla").value;
    if(Clave=="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('fLista'));
        $.ajax({
            type: "POST",
            url: "generarLista.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) {
                alert("Curso finalizado");
                }
                if(res==2)
                alert("Conexion fallida");
            }
        });
    }
    else
    {
        alert("El curso no puede ser finalizado");
    }
}
