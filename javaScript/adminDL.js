function guardarDL()
{
    var ok= true;
    var Ins = document.getElementById("txIns").value;
    if(Ins=="")
    {
        ok=false;
    }
    var Area = document.getElementById("txArea").value;
    if(Area =="")
    {
        ok=false;
    }
    var Puesto = document.getElementById("txPuesto").value;
    if(Puesto=="")
    {
        ok=false;
    }
    var Jefe = document.getElementById("txJefe").value;
    if(Jefe=="")
    {
        ok=false;
    }
    var Telefono = document.getElementById("txTelefono").value;
    if(Telefono=="")
    {
        ok=false;
    }
    var Ext = document.getElementById("txExt");
    if(Ext=="")
    {
        ok=false;
    }
    var Horario = document.getElementById("txHrio").value;
    if(Horario="")
    {
        ok = false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('adminDL'));
        $.ajax({
            type: "POST",
            url: "administrarDL.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) 
                alert("Datos guardados correctaménte");
            }
        });
    }
    else
    {
        alert("Ingrese sus datos antes de presionar el botón");
    }
}