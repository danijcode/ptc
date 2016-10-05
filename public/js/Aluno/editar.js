$(document).ready(function(){  
    
    // Campos maiusculos
    Maiusculo('#academia');
    Maiusculo('#nome');
    Maiusculo('#endereco');
    
    $("#fCadastro").validate({         
        rules: {  
            email : {
                email:true
            }
        }
    });
    
    $("#dataNascimento").mask("99/99/9999");
    $("#telefone").mask("(99)9999-9999");
    
});
