function registrar()
{
    var ok= true;
    var User = document.getElementById("txUser").value;
    if(User=="")
    {
        ok=false;
    }
    var Pass = document.getElementById("txPassword").value;
    if(Pass =="")
    {
        ok=false;
    }
    var Nom = document.getElementById("txNom").value;
    if(Nom=="")
    {
        ok=false;
    }
    var Apell = document.getElementById("txApll").value;
    if(Apell=="")
    {
        ok=false;
    }
    var Func = document.getElementById("txFuncion").value;
    if(Func=="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('fAdmonUsuarios'));
        $.ajax({
            type: "POST",
            url: "registrar.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) {
                alert("Usuario registrado con éxito");
                }
                if(res==2)
                alert("Usuario ya existente");
                if(res==3)
                alert("Conexión fallida");

            }
        });
    }
    else
    {
        alert("Uno o varios campos están vacíos");
    }
}
function actualizar()
{
    var ok= true;
    var User = document.getElementById("txUser").value;
    if(User=="")
    {
        ok=false;
    }
    var Nom = document.getElementById("txNom").value;
    if(Nom=="")
    {
        ok=false;
    }
    var Apell = document.getElementById("txApll").value;
    if(Apell=="")
    {
        ok=false;
    }
    
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('fAdmonUsuarios'));
        $.ajax({
            type: "POST",
            url: "actualizar.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) 
                alert("Usuario actualizado con éxito");
                if(res==2)
                alert("Conexión fallida");
            }
        });
    }
    else
    {
        alert("Para actualizar un usuario primero debe buscar sus datos con el nombre de usuario, posteriormente debe modificar el o los campos que requiera");
    }
}
function eliminar()
{
    var ok= true;
    var User = document.getElementById("txUser").value;
    if(User=="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('fAdmonUsuarios'));
        $.ajax({
            type: "POST",
            url: "eliminar.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1)                    
                alert("Usuario eliminado con éxito");
                if(res==2)
                alert("El usuario no existe, intente con otro");
                if(res==3)
                alert("Conexión fallida");

            }
        });
        
    }
    else
        {
            alert("Para eliminar teclee el nombre de usuario");
        }
}
function restaurarContra()
{
    var dataForm = new FormData(document.getElementById('fAdmonUsuarios'));
    $.ajax({
        type: "POST",
        url: "restaurarContra.php",
        data: dataForm,
        cache:false,
        contentType: false,
        processData:false,
        success: function(res)
        {
            console.log(res);
            if(res==1) 
            alert("Contraseña restaurada a sus valores predeterminados");
            if(res==2)
            alert("Conexión fallida");
        }
    });
}
function limpiarFormulario() {
    var usuario = document.getElementById("txUser").value = "";
    usuario.innerHTML = "".value;
    var contra = document.getElementById("txPassword").value = "";
    contra.innerHTML = "".value;
    var nombre = document.getElementById("txNom").value = "";
    nombre.innerHTML = "".value;
    var apellido = document.getElementById("txApll").value = "";
    apellido.innerHTML = "".value;
    var funcion = document.getElementById("txFuncion").value ="Interno";
    funcion.innerHTML = "".value;
}