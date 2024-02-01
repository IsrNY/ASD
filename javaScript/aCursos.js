function registrarCursos()
{
    var ok= true;
    var Clave = document.getElementById("txClave").value;
    if(Clave=="")
    {
        ok=false;
    }
    var NomSer = document.getElementById("txNombreS").value;
    if(NomSer =="")
    {
        ok=false;
    }
    var Objetivo = document.getElementById("txObjetivo").value;
    if(Objetivo=="")
    {
        ok=false;
    }
    var Periodo = document.getElementById("txPeriodo").value;
    if(Periodo=="")
    {
        ok=false;
    }
    var Lugar = document.getElementById("txLugar").value;
    if(Lugar=="")
    {
        ok=false;
    }
    var Horas = document.getElementById("txNumH");
    if(Horas=="")
    {
        ok=false;
    }
    var Instructor = document.getElementById("txInstructor");
    if(Instructor=="")
    {
        ok=false;
    }
    var DirigidoA = document.getElementById("txDirigido");
    if(DirigidoA=="")
    {
        ok=false;
    }
    var PreRR = document.getElementById("txPre");
    if(PreRR=="")
    {
        ok=false;
    }
    var Horario = document.getElementById("txHorarioC");
    if(Horario=="")
    {
        ok=false;
    }
    if(ok)
    {
        var dataForm = new FormData(document.getElementById('aCursos'));
        $.ajax({
            type: "POST",
            url: "aCursos.php",
            data: dataForm,
            cache:false,
            contentType: false,
            processData:false,
            success: function(res)
            {
                console.log(res);
                if(res==1) 
                {
                alert("Curso registrado con éxito");
                }
                if(res==2)
                {
                alert("Esta clave de curso ya esta registrada en otro curso, intente con otra");
                }
                if(res==3)
                {
                alert("Conexión fallida");
                }
            }
        });
    }
    else
    {
        alert("Para registar el curso todos los campos deben estar llenos");
    }
}

function modificar() 
{
    var ok= true;
    var Clave = document.getElementById("txClave").value;
    if(Clave=="")
    {
        ok=false;
    }
    var NomSer = document.getElementById("txNombreS").value;
    if(NomSer =="")
    {
        ok=false;
    }
    var Objetivo = document.getElementById("txObjetivo").value;
    if(Objetivo=="")
    {
        ok=false;
    }
    var Periodo = document.getElementById("txPeriodo").value;
    if(Periodo=="")
    {
        ok=false;
    }
    var Lugar = document.getElementById("txLugar").value;
    if(Lugar=="")
    {
        ok=false;
    }
    var Horas = document.getElementById("txNumH");
    if(Horas=="")
    {
        ok=false;
    }
    var Instructor = document.getElementById("txInstructor");
    if(Instructor=="")
    {
        ok=false;
    }
    var DirigidoA = document.getElementById("txDirigido");
    if(DirigidoA=="")
    {
        ok=false;
    }
    var PreRR = document.getElementById("txPre");
    if(PreRR=="")
    {
        ok=false;
    }
    var Horario = document.getElementById("txHorarioC");
    if(Horario=="")
    {
        ok=false;
    }
    if (ok)
    {
        var dataForm = new FormData(document.getElementById('aCursos'));
        $.ajax({
            type: "POST",
            url: "modificarCurso.php",
            data: dataForm,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log(res);
                if(res == 1)
                    alert("Curso modificado con éxito");
                if(res == 2)
                    alert("Eror en la conexion");
            }
        })
    }
}
function limpiarFormulario() {
    var clave = document.getElementById("txClave").value = "";
    clave.innerHTML = "".value;
    var estado = document.getElementById("txEst").value = "En espera";
    estado.innerHTML = "".value;
    var nombre = document.getElementById("txNombreS").value = "";
    nombre.innerHTML = "".value;
    var objetivo = document.getElementById("txObjetivo").value = "";
    objetivo.innerHTML = "".value;
    var periodo = document.getElementById("txPeriodo").value ="";
    periodo.innerHTML = "".value;
    var lugar = document.getElementById("txLugar").value="";
    lugar.innerHTML = "".value;
    var hras = document.getElementById("txNumH").value="";
    hras.innerHTML="".value;
    var instructor = document.getElementById("txInstructor").value="";
    instructor.innerHTML="".value;
    var rfc = document.getElementById("txRFC").value="";
    rfc.innerHTML="".value;
    var dirigido = document.getElementById("txDirigido").value="";
    dirigido.innerHTML="".value;
    var pre = document.getElementById("txPre").value="";
    pre.innerHTML="".value;
    var horario = document.getElementById("txHorarioC").value="";
    horario.innerHTML="".value;
}