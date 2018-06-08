<style>
    .cadastroMsg{
        padding: 20px;
        margin: 20px 0;
        border: 1px solid #eee;
        border-left-width: 5px;
        border-radius: 3px;
        display: none;
    }
    .cadastroSucess{
        border-left-color: #4cae4c;
        background-color: #dff0d8;
    }
    .cadastroFailed{
        background-color: #f2dede;
        border-left-color: #ce4844;
    }
    .cadastroCamposVazios{
        background-color: #faebcc;
        border-left-color: #aa6708;
    }
    
    .containerFormCadastroUsuario{
        width: 100%;
    }
    
    .modal .modal-dialog {
        max-width: 500px;
    }
    
    .modal-header{
        border: 0;
        text-align: center;
        padding-bottom: 0;
    }
    .title{
        font-size: 15pt;
        display: none;
    }
    
    .modal-body{
        padding-top: 0;
        padding-bottom: 0;
    }
    
    .modal-footer{
        border: 0;
        padding-top: 0;
    }
</style>
<div class="modal fade" id="modalCadastroQuarto" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="containerConfirmacaoCadastroQuarto">

                <div class="modal-header">
                    <div class="title titleSucess">
                        <h4><b>Muito bem!</b> Sua vaga foi cadastrada.</h4>
                    </div>

                    <div class="title titleFailed">
                        <h4><b>Ops!</b> Parece que algo inesperado aconteceu.</h4>  
                    </div>
                    
                    <div class="title camposVazios">
                        <h4><b>Ops!</b> O(s) campo(s) a seguir não foram preenchido(s)!</h4>  
                    </div>
                    
                    <div class="title validando">
                        <h4> Aguarde. <br>Estamos validando as informações.</h4>  
                    </div>
                </div>

                <div class="modal-body">
                    
                    <div class="cadastroMsg cadastroSucess">
                       Sua vaga ja se encontra disponivel para ser pesquisada, boa sorte com seu novo futuro morador.
                    </div>

                    <div class="cadastroMsg cadastroFailed">
                        Pedimos desculpas pelo transtorno.<br>
                        Mas parece que ocorreu algum erro no momento do cadastro.
                        Por favor tente novamente mais tarde.
                    </div>
                    
                    <div class="cadastroMsg cadastroCamposVazios">
                        
                    </div>
                    
                    <div class="cadastroMsg loading">
                        <center> 
                            <img src='/Roomie/view/imagens/loading.gif'> 
                        </center>
                    </div>
                </div> 

                <div class="modal-footer">
                    
                    <div class="modal-footer">
                        
                        <button id="btnFecharModalCadastroVaga" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>       
            </div>  
        </div>
    </div>
</div>
 