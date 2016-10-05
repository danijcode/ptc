function Maiusculo(campo)
{
    $(campo).keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
}
