$(document).ready(function(){
    
    /* Indicador de etapa */
    $(".btnIndicadorEtapas, .avancar, .voltar").on("click", function(){
        
        //Troca o texto do topo, referente a cada etapa
        $(".pEtapas").each(function(){
            
           $(this).css({"display":"none"});
        });
        $("#" + $(this).attr("data-topo") ).fadeIn( 1000 );
        
        //desabilita o botão da etapa na tela
        //troca a classe para active do botão clicado
        $(".btnIndicadorEtapas").each(function(){
            
            $(this).attr("disabled", false);
            $(this).removeClass("btnEtapaActive");
        });        
        $(this).attr("disabled", true);
        $(this).addClass("btnEtapaActive");
        
        //função para trocar a classe dos botoes de etapa caso o avançar/voltar seja clicado
        if( $(this).parent().attr("id") == "indicadoresEtapas"){
            
            $("button[data-etapa = "+ $(this).attr("data-etapa") +"]").addClass("btnEtapaActive");
            $("button[data-etapa = "+ $(this).attr("data-etapa") +"]").attr("disabled", true);
        }
        
        //Avança o formulario
        $(".etapas").each(function(){
            
            $(this).slideUp();
        });        
        $("#" + $(this).attr("data-etapa") ).slideDown();
        
        $('body,html').animate({scrollTop: 50});
    });
    /* / Indicador de etapa */
    
    /* Formulario etapa 1 */
    //mascara para formatar o valor
    $("#valor, #valorDespesas").mask('0.000,00', {reverse: true});
    
    //Função aplicada para todos os buttons da etapa 1
    $(".divFormCadastroVagas #etapa1 .btnClick").on("click",function(click){
        
        //inicio do click
        $(this).attr("data-click", "1");
        
        //desativa o envio do button assim que clicado
        click.preventDefault();
        
        //Desmarca o button caso um da mesma classe seja selecionado
        $("#" + $(this).parent().parent().attr("id") + " button").each(function(){
            
            if ( $(this).attr("data-checked") == 1 && $(this).attr("data-click") != 1 ){
                
                $(this).css({"background":"#fff"});
                
                $(this).attr("data-checked", 0);
            }
        });
        
        //Marca o button selecionado e desmarca caso ele seja clicado novamente
        if( $(this).attr( "data-checked" ) == 0 ){
            
            $(this).css({"background":"#ccc"});
            
            $(this).attr("data-checked", 1);
            
            $("." + $(this).attr("data-input") ).attr("value", $(this).attr("data-value"));
        }            
        else{
            
            $(this).css({"background":"#fff"});
            
            $(this).attr("data-checked", 0);
            
            $("." + $(this).attr("data-input") ).attr("value", "");
        }
        
        //termino do click
        $(this).attr("data-click", "0");
    });
    
    //Verifica se o valor da seleção de quarto é individual ou compartilhado e libera o campo de vagas
    $(".btnTipoQuarto").on("click", function(){
        
        //caso esteja marcado o button "compartihlado" ele libera os campos de vagas
        if( $(".btnTipoQuarto[data-value = compartilhado]").attr("data-checked") == 1){

            $(".btnNumVagas").each(function (){
                
                $(this).prop("disabled", false);
            });
        }
        else{
            
            $(".btnNumVagas").each(function (){
                
                $(this).prop("disabled", true);
                $(this).css({"background":"#fff"});
                $(this).attr("data-checked", "0");
            });
            
            //reseta o valor de vagas
            $(".inputNumVagas").attr("value", "");
        }
    });
    
    //toda vez que uma tecla é precionada no valor, o input se altera
    $("#valor, #valorDespesas").keyup(function() {
        
        $("." + $(this).attr("data-input") ).attr("value", $(this).val());
    });
    /* / Formulario etapa 1 */
    
    
    /* Formulario etapa 2*/
    //Função aplicada para todos os buttons da etapa 2
     $(".divFormCadastroVagas #etapa2 .btnClick").on("click",function(click){
        
        //inicio do click
        $(this).attr("data-click", "1");
        
        //desativa o envio do button assim que clicado
        click.preventDefault();
        
        //Desmarca o button caso um irmao seja selecionado (ID)
        $("#" + $(this).parent().parent().attr("id") + " button").each(function(){
            
            if ( $(this).attr("data-checked") == 1 && $(this).attr("data-click") != 1 ){
                
                $(this).css({"color":"#565a5c"});
                
                $(this).attr("data-checked", 0);
            }
        });
        
        //Marca o button selecionado e desmarca caso ele seja clicado novamente
        if( $(this).attr( "data-checked" ) == 0 ){
            
            //verifica se o botão precionado é true ou false
            if( $(this).attr("data-value") == "true" ){

                $(this).css({"color":"green"});
            }
            else{

                $(this).css({"color":"red"});
            }
            
            $(this).attr("data-checked", 1);
            
            $("." + $(this).attr("data-input") ).attr("value", $(this).attr("data-value"));
        }            
        else{
            
            $(this).css({"color":"#565a5c"});
            
            $(this).attr("data-checked", 0);
            
            $("." + $(this).attr("data-input") ).attr("value", "");
        }
        
        //termino do click
        $(this).attr("data-click", "0");
    });
    
    //verifica se o valor da mobilia esta marcado
    $(".btnMobiliaQuarto").on("click",function(){
        
        //Verifica foram os botoes da mobilia clicado, liberando ou bloqueando a opção de descrição
        if( $(this).attr("data-value") == "true" && $(this).attr("data-checked") == 1){
            
            $("#descricaoMobilia").prop("disabled", false);
        }
        else{
            $("#descricaoMobilia").prop("disabled", true);
        }
    });
    /* / Formulario etapa 2*/
    
    /* Formulario etapa 3*/
    
    $(".fotos").on("click", function(){
        
        //chama o input file referente a thumbnail clicada pelao atributo "data-input"
        $("#" + $(this).attr("data-input") ).click();
    });
    
    function modal_imagem(){
        
        $('.foto-enviada').on('click', function(e){
           
            e.preventDefault();
            
            var img = " <img class='img-responsive' src='" + $(this).prop('src') + "'>";;
            
            $('#modal-imagem .modal-content .modal-content-img').html(img);
            
            $('#modal-imagem').modal('show');
        });
    }
    
    $(".inputImages").change(function (){
        
        $("#fotos-enviadas .container-fotos-enviadas").html( "" );
        
        //percorre todos os arquivos enviados
        for (var i = 0; f = this.files[i]; i++){

            /*
             * O objeto FileReader permite aplicações 
             * web ler assincronamente o conteúdo dos arquivos
             */
            var reader = new FileReader();
            
            /*
             * Inicia a leitura do conteúdo do input especificado, uma vez finalizado, 
             * o atributo result conterá um data: URL representando os dados do arquivo.
             */
            reader.readAsDataURL(f);
            
            /*
             * Um manipulador para o evento load. 
             * Este evento é chamado cada vez que a operação de leitura é completada com sucesso.
             */
            reader.onload = function (e) {
                
                var img = "<div class='container-foto-enviada'> \n\
                                <a target='_blank' href='" + e.target.result + "'>\n\
                                    <img class='foto-enviada' src='" + e.target.result + "'>\n\
                                </a>\n\
                           </div>";
                
                $("#fotos-enviadas .container-fotos-enviadas").append( img );
                
                modal_imagem();
            };
        }
    });
    /* / Formulario etapa 3*/
    
    /* Formulario etapa 4*/
    //Função aplicada para todos os buttons da etapa 4
    //toda vez que uma tecla é precionada, o foco sair ou o valor alterar no valor, o input se altera
    $("#cep").mask('00000-000');
    
    $("#cep").change(function(){
        
        $.getScript(
            "http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), 
            
            function(){
                //Se o resultado for igual a 1
                if(resultadoCEP["resultado"] == 1){
                    
                    $("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#estado").val(unescape(resultadoCEP["uf"]));
                }
                else{
                    alert("Endereço não encontrado");
                }
                
                $(".divFormCadastroVagas #etapa4 input").each(function(){
                    
                    $( "." + $(this).attr("data-input") ).attr( "value", $(this).val() );
                });
            }
        );
    });
    
    $(".divFormCadastroVagas #etapa4 input").keyup(function() {

        $( "." + $(this).attr("data-input") ).attr( "value", $(this).val() );
    });
    $(".divFormCadastroVagas #etapa4 input").change(function() {

        $( "." + $(this).attr("data-input") ).attr( "value", $(this).val() );
    });
    $(".divFormCadastroVagas #etapa4 input").blur(function() {

        $( "." + $(this).attr("data-input") ).attr( "value", $(this).val() );
    });
    /* / Formulario etapa 4*/
    
    /* Formulario modal com textArea */
    var input;
    
    $(".textArea").on("click", function(){
        
        //input aonde sera gravado a informação;
        input = this;
        
        //Coloca no text area o conteudo do input referente
        if( $("." + $(this).attr("data-input")).val() == "null" ){
            
            $("#modalTextArea textarea").val("");
        }
        else{
         
            $("#modalTextArea textarea").val( $("." + $(this).attr("data-input")).val() );
        }
        
        //troca o titulo da modal
        $("#modalTextArea .modal-header h3").html( $(this).html() );
        
        //exibe ela na tela
        $("#modalTextArea").modal('show');
    });
    
    //
    $('#modalTextArea').on('hidden.bs.modal', function (e) {
        
        $("." + $(input).attr("data-input")).val( $("#modalTextArea textarea").val() );
    });
    /* / Formulario modal com textArea */    
    
    /* fechamento modal */
    // função para decidir a ação apos o fchamnto da modal
    $("#modalCadastroQuarto").on("hidden.bs.modal", function(){
        
        //casoo cadastro esteja sucesso, vc é redirecionado para a pagina de "minhas vagas"
        if( $(this).attr("data-retorno") == 1 ){

           //window.location = "minhas-vagas";
        }
        //controtrario voce retorna para a primeira etapa do cadastro
        else if( $(this).attr("data-retorno") == 2 ){

            //volta na primeita etapa do form
            $(".etapas").each(function(){

                $(this).slideUp();
            });
            $("#etapa1" ).slideDown();
            
            //volta o botão marcado para o primeiro e o desabilita
            $(".btnIndicadorEtapas").each(function(){

                $(this).attr("disabled", false);
                $(this).removeClass("btnEtapaActive");
            });        
            $("button[data-etapa = etapa1]").attr("disabled", true);
            $("button[data-etapa = etapa1]").addClass("btnEtapaActive");
            
            //volta o texto de orientação para o primeiro
            $(".pEtapas").each(function(){
            
                $(this).css({"display":"none"});
            });
            $("#topoEtapa1" ).fadeIn( 1000 );
            
            $('body,html').animate({scrollTop: 50});
        }
    });
    /* fechamento modal */
});