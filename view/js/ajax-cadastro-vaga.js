$(document).ready(function(){
    
    /* 
     * Submit formulario Ajax
     */
    $(".salvar").on("click",function(){
        
        /*
         * esconde todas as divs da modal
         */                                                          
        $("#modalCadastroQuarto .modal-header .title").css({"display":"none"});
        $("#modalCadastroQuarto .modal-body .cadastroMsg").css({"display":"none"});
        
        /*
         * loading de inicio para caso ocorra demora na transação
         */
        $("#modalCadastroQuarto .modal-header .validando").css({"display":"block"});
        $("#modalCadastroQuarto .modal-body .loading").css({"display":"block"});
        
        /*
         * chama a modal
         */
        $("#modalCadastroQuarto").modal("show");
        
        /*
         * troca os valores de todos inputs vazios por "null"
         */
        $("#fomCadastroVagas .textForm").each(function(){
            
            if( $(this).val() == "" ){
                
                if ( $(this).prop("tagName") == "INPUT" ){
                    
                    $(this).attr("value","null");
                }
                else{
                    
                    $(this).val("null");
                }
            }
        });
        
        /*
         * recebera o conteudo do post
         */
        var POST = new FormData();

        /*
         * roda todos os inputs exeto os da imagem
         */
        $("#fomCadastroVagas .textForm").each(function (){

            POST.append( $(this).attr("name"), $(this).val() );
        });

        /*
         * rodas os inputs das imagens
         */
        $(".inputImages").each(function (){
            
            var input = $(this); 
           
            for (var i = 0; f = this.files[i]; i++){
                 
                POST.append(input.prop("name"), f);
            }
        });

        $.ajax({
            url: "/Roomie/ajax/iobj/cadastrovagas",

            data: POST,

            processData: false,

            contentType: false,

            type: 'POST',

            success: function ( retorno ) {
                
                /*$("#footer").html( retorno );*/
                
                /*
                 * esconde todas as divs da modal  
                 */                                                        
                $("#modalCadastroQuarto .modal-header .title").css({"display":"none"});
                $("#modalCadastroQuarto .modal-body .cadastroMsg").css({"display":"none"});

                /*
                 * divide o retorno em um array a partir dos "pipes"
                 */
                var arrayCamposErro = retorno.split("|");

                /*
                 * caso não tenha nunhum erro NO FORMULARIO
                 */
                if ( arrayCamposErro.length === 1){

                    if( retorno ){    

                        $("#modalCadastroQuarto .modal-header .titleSucess").css({"display":"block"});
                        $("#modalCadastroQuarto .modal-body .cadastroSucess").css({"display":"block"});
                    }
                    else{                       

                        $("#modalCadastroQuarto .modal-header .titleFailed").css({"display":"block"});
                        $("#modalCadastroQuarto .modal-body .cadastroFailed").css({"display":"block"});
                    }

                    /*
                     * variavel para indentificar no MODAL a resposta do cadastro, para decidir 
                     * qual sera a função de fechamanto dela
                     */
                    $("#modalCadastroQuarto").attr("data-retorno", 1);
                }
                else if ( arrayCamposErro.length > 1){

                    var campos = "";
                    arrayCamposErro.pop();

                    $("#modalCadastroQuarto .modal-header .camposVazios").css({"display":"block"});

                    $.each(arrayCamposErro, function(indiceCampo, campo){

                        campos += campo + "<br>";
                    });

                    $("#modalCadastroQuarto .modal-body .cadastroCamposVazios").html( campos );
                    $("#modalCadastroQuarto .modal-body .cadastroCamposVazios").css({"display":"block"});

                    /*
                     * variavel para indentificar no MODAL a resposta do cadastro, para decidir qual sera a função de fechamanto dela
                     */
                    $("#modalCadastroQuarto").attr("data-retorno", 2);
                }
                        
                /*
                 * habilita o botão de fechar da modal so quando a transação termina
                 * $("#btnFecharModalCadastroVaga").attr("disabled", false);
                 */
            }
        });
    });
});