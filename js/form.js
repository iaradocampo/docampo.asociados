$("#close").on("click", function () {
    $(".modal").css('transform', 'scale(0)');
});

$('#enviar').on('click', function () {
    var form = $(this).parents("#formulario");
    var check = validarCampos(form);
    if (check) {
        $.ajax({
            url: './enviarMail.php',
            type: 'post',
            dateType: 'json',
            data: {
                nombre: $('#nombre').val(),
                apellido: $('#apellido').val(),
                correo: $('#correo').val(),
                telefono: $('#telefono').val(),
                mensaje: $('#mensaje').val()
            }
        }).done(
            function (data) {
                disableSend();
                showModal();
            }
        );
        $('#enviar').text('POR FAVOR ESPERE...');
        $('#enviar').attr('disabled', true);
        resetForm();
    }
});

function resetForm() {
    $('#nombre').val('');
    $('#apellido').val('');
    $('#correo').val('');
    $('#telefono').val('');
    $('#mensaje').val('');
}

function validarCampos(obj) {
    var camposRellenados = true;
    obj.find("input").each(function () {
        var $this = $(this);
        if ($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        }
    });
    if (camposRellenados == false) {
        return false;
    } else {
        return true;
    }
}

function disableSend() {
    $('#enviar').text('MENSAJE ENVIADO');
    $('#enviar').attr('disabled', true);
    $('#enviar').addClass("disabledButton");
}

function showModal() {
    $('.modal').append('<p class="msjOk">Gracias por contactarte con nosotros, te responderemos a la brevedad.</p>');
    $('.modal').css('transform', 'scale(1)');
    $('.modal').animate({
        left: '750px',
    }, "slow");
}