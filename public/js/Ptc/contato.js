$(document).ready(function(){  
    
    // Campos maiusculos
    Maiusculo('#nome');
    Maiusculo('#cidade');
    Maiusculo('#assunto');
    Maiusculo('#mensagem');
    
    $("#fCadastro").validate({         
        rules: {  
            email : {
                email:true
            }
        }
    });
    
    $("#telefone").mask("(99)9999-9999");
    
});
