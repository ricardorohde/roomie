$(document).ready(function(){
    
    /*funcao que sera chamada toda vez que o elemento com a id enviar for clicado*/
    $("#btnCadastrarUsuario").on("click", function(){        
        
        /*desabilita o botão de envio enquanto estiver ocorrendo o post*/
        $('#btnCadastrarUsuario').attr('disabled','disabled');
        
        /*exibir loading caso demore para executar*/
        $( "#loadingCadastroUsuario" ).html("<img src='/Roomie/view/imagens/loading.gif'>");
        
        /*Ajax de envio pelo metodo post*/
        $.post(
            
            /*pagina aonde sera enviado os dados via ajax*/
            "/Roomie/ajax/iobj/cadastrousuario/",
            
            /*montando o array $_POST com os dados preenchidos no formulario*/
            {
                pNome:     $("#pNome").val(),
                sNome:     $("#sNome").val(),
                email:     $("#email").val(),
                telefone:  $("#telefone").val(),
                dataNasc:  $("#dataNasc").val(),
                senha:     $("#senha").val(),
                confSenha: $("#confSenha").val()
            },			
            
            /*Função callback, tratando o resultado do controller*/
            function(retorno){
                
                /*$("body").html( retorno );*/
                
                /*recebe os campos e o erro em forma de string e separa pelo delimitador |*/
                var arrayInputsEErros = retorno.split("|");                
                
                /*passa por todos os form-group retirando a classe de erro caso ela exista*/
                $(".form-group").removeClass("has-error");
                
                /*colocando classe de sucesso nos campos certos*/
                $(".form-group").addClass("has-success");    
                
                /*retirando a cor de fundo dos formularios sem erro*/
                $(".form-group input").css("background-color", "white");
                
                /*confere se houve algum erro no form*/
                if(arrayInputsEErros.length === 1){
                    
                    
                    /*
                     * Apos ser realizado o cadastro exibir uma msg de confirmação
                     * menssagem carregada via ajax, puxando de uma view
                     */
                    $.post(
                        
                        /*controlador que ira carregar uma view adequada para o usuario de acordo com o insert*/
                        '/Roomie/ajax/load/confirmacao-cadastro-usuario', 
                        /*mandamos o resutado do insert para um controlador */
                        {
                            div: retorno
                        },
                        
                        /*chama a view que foi setada no controlador de acordo com o resultado do insert: sucess/failed*/
                        function(data){
                            
                            $(".modal-content").fadeOut(1000, function(){
                                
                                $(".modal-content").html(data).fadeIn(1000);
                            });
                        }
                    );
                }
                else if(arrayInputsEErros.length === 2){
                    
                    /*recebe os campos aonde o erro ocorreu em forma de array*/
                    var arrayInputErro    = arrayInputsEErros[0].split(",");                
                    
                    /*recebe o qual o erro ocorrido em forma de array*/
                    var arrayErros        = arrayInputsEErros[1].split(",");                  
                    
                    /*retira o ultimo campo do array que esta em branco;*/
                    arrayErros.pop();
                    arrayInputErro.pop();
                    
                    /*armazenara o campo aonde exibira o erro*/
                    var pErro;

                    /*roda todos os campos com erro e alterando sua classe*/
                    $.each(arrayInputErro, function(indiceInput, idInput){
                        
                        /*trocando a classe do form para erro caso ocorra*/
                        $( $(idInput).parent() ).addClass("has-error");
                        
                        /*expressao regular para retirar '#' e . do campo do erro para ser reusado*/
                        pErro = idInput.replace(/[#.]/, "");                
                        
                        /*apagando o primeiro caracter do indice 0, 
                        que por algum motivo vem com um espaço da pagina do controller*/
                        if(indiceInput == 0){
                            
                           pErro = pErro.substring(1);
                        }
                        
                        /*limpando o conteudo do form com erro*/
                        $(idInput).val("");                        
                        
                        /*lterando o placeholder do input para a msg de erro*/
                        $(idInput).prop("placeholder", arrayErros[indiceInput]);
                        
                        /*alterando o bg-color do input com erro*/
                        $(idInput).css("background-color", "#fff8e5");
                    });
                }
                
                /*retirando o loading em fadeout apos carregamento das informações*/
                $( "#loadingCadastroUsuario img" ).fadeOut( 1000 );
                
                /*abilita o botão apos terminar o envio*/
                $('#btnCadastrarUsuario').removeAttr('disabled');
            }
        );
    });
    
    /*Dados facebook*/
    $('#btn-facebbok-login').click( function(event){
 
        event.preventDefault();
        /*desabilita o botão de envio enquanto estiver ocorrendo o post*/
        $('#btnCadastrarUsuario').attr('disabled','disabled');
        
        /*exibir loading caso demore para executar*/
        $( "#loadingCadastroUsuario" ).html("<img src='/Roomie/view/imagens/loading.gif'>");

        FB.login(function(response) {
            
            if (response.authResponse) {
            
                FB.api('/me', {fields: 'first_name, last_name'}, function(response) {
                    
                    alert ( response.first_name );
                    alert ( response.last_name );
                    
                    /*retirando o loading em fadeout apos carregamento das informações*/
                    $( "#loadingCadastroUsuario img" ).fadeOut( 1000 );

                    /*abilita o botão apos terminar o envio*/
                    $('#btnCadastrarUsuario').removeAttr('disabled');
                });
            } 
        });
    });

    /*Macara inputs*/
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $("#telefone").mask(SPMaskBehavior, spOptions);

    $('.nome').mask('NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN', {'translation': { N: {pattern: /[A-Za-z]/}} });

    $('#dataNasc').mask('99/99/9999');

    $(".modal").on("hidden.bs.modal", function(){
        $(this).removeData();
    });
});