$(document).ready(main);

function main() {
    $('#subir').on('click', function() {
        var formData = new FormData(document.getElementById('constancias'));
        $.ajax({
            type: 'POST',
            url: 'SubirC.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log(res);
                if (res == 1)
                    location.href = 'cursosFinalizados.php'
            }
        });
    });
}