$(document).ready(function(){
   
    $("#btnLoginUsuario").on("click", function (){
        
        $('#btnLoginUsuario').attr('disabled', 'disabled');

        $('#btnLoginUsuario').css({"display": "none"});        
        
        $('#loadingLoginUsuario').fadeIn(100).css({"display": "inline"});
        
        if( $("#manterConectado").is(":checked") ){
            
            var manterConectado = 1;
        }
        else{
            
            var manterConectado = 0;
        }
        
        $.post(
            "/Roomie/ajax/iobj/loginusuario/",
            
            {
                email: $("#emailLogin").val(),
                senha: $("#senhaLogin").val(),
                manterConectado: manterConectado
            },
            
            function( retorno ){
                
                $( $("#emailLogin").parent() ).removeClass("has-error");
                $( $("#senhaLogin").parent() ).removeClass("has-error");
                
                if( retorno == 0 ){                    
                    
                    $( $("#emailLogin").parent() ).addClass("has-error");
                    $( $("#senhaLogin").parent() ).addClass("has-error");
                    
                    $("#emailLogin").val("");
                    $("#senhaLogin").val("");
                    
                    $("#emailLogin").css("background-color", "#fff8e5");
                    $("#senhaLogin").css("background-color", "#fff8e5");
                      
                    $("#emailLogin").prop("placeholder", "Email incorreto");
                    $("#senhaLogin").prop("placeholder", "Senha incorreta");
                    
                    $('#loadingLoginUsuario').css({"display": "none"});        
                    $('#btnLoginUsuario').css({"display": "inline"});        
                    $('#btnLoginUsuario').removeAttr('disabled');
                }
                else if ( retorno == 1 ){
                    
                    location.reload();
                }
                else{
                    
                    $("body").html( retorno );
                }
            }
        );
    });
        
    $(".modal").on("hidden.bs.modal", function(){
        $(this).removeData();
    });
});
