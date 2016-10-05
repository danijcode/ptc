$(document).ready(function(){  
    
    // Campos maiusculos
    Maiusculo('#nome');
    Maiusculo('#endereco');
    
    $("#fCadastro").validate({         
        rules: {  
            email : {
                email:true
            }
        }
    });
    
    $("#telefone").mask("(99)9999-9999");
    
});
