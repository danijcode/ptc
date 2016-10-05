$(document).ready(function() {

    // Campos maiusculos
    Maiusculo('#nome');
    Maiusculo('#observacao');

    $("#fCadastro").validate({
        rules: {
            email: {
                email: true
            }
        }
    });

    $("#dataTreino").mask("99/99/9999");

    $("#btnAddAtributo").click(function() {
        var novoAtributo = $("#atributo").clone();
        $(".atributoContent").append(novoAtributo.show());
    });
    
});
