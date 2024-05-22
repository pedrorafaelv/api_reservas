// public/js/recursos.js

$(document).ready(function() {
    $('#empresa_id').change(function() {
        var empresaId = $(this).val();
        $.get('/recursos/' + empresaId, function(data) {
            $('#recurso').empty();
            $.each(data, function(key, recurso) {
                $('#recurso').append('<option value="' + recurso.id + '">' + recurso.nombre + '</option>');
            });
        });
    });
});