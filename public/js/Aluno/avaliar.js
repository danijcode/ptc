$(document).ready(function(){  

    $("#fCadastro").validate({         
        rules: {  
            email : {
                email:true
            }
        }
    });
    
    $("#data").mask("99/99/9999");
    $("#peso").mask("999.99");
    $("#altura").mask("9.99");
    $("#peitoral").mask("999.99");
    $("#cintura").mask("999.99");
    $("#abdomen").mask("999.99");
    $("#quadril").mask("999.99");
    
});
