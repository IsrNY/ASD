function guardar()
{
    var ok= true;
    var User = document.getElementById("txUser").value;
    if(User=="")
    {
        ok=false;
    }
    var RFC = document.getElementById("txRFC").value;
    if(RFC =="")
    {
        ok=false;
    }
    var CURP = document.getElementById("txCURP").value;
    if(CURP=="")
    {
        ok=false;
    }
    var Correo = document.getElementById("txCorreo").value;
    if(Correo=="")
    {
        ok=false;
    }
    var Estudio = document.getElementById("txEstudios").value;
    if(Estudio=="")
    {
        ok=false;
    }
    var Carrera = document.getElementById("txCarrera");
    if(Carrera=="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('adminDP'));
        $.ajax({
            type: "POST",
            url: "administrarDP.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) 
                alert("Datos guardados con éxito");
            }
        });
    }
    else
    {
        alert("Ingrese sus datos antes de presionar el botón");
    }
}