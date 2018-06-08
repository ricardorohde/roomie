<script type="text/javascript">
    $(document).ready(function(){
        
        $(".modal").on("hidden.bs.modal", function(){
            $(this).removeData();
        });
    });
</script>

<style>
    .cadastroMsg{
        padding: 20px;
        margin: 20px 0;
        border: 1px solid #eee;
        border-left-width: 5px;
        border-radius: 3px;
    }
    .cadastroSucess{
        border-left-color: #4cae4c;
        background-color: #dff0d8;
    }
    .cadastroFailed{
        background-color: #f2dede;
        border-left-color: #ce4844;
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

<div class="containerFormCadastroUsuario">
              
    <div class="modal-header">
        <?php if( $_POST['div'] > 0) : ?>
            <div class="title titleSucess">
                <h4><b>Muito bem!</b> Voce acaba de se cadastrar no Roomie.</h4>
            </div>
        <?php else : ?>
            <div class="title titleFailed">
                <h4><b>Ops!</b> Parece que algo inesperado aconteceu.</h4>  
            </div>
        <?php endif ; ?>
    </div>

    <div class="modal-body">
        <?php if( $_POST['div'] > 0) : ?>
        <div class="cadastroMsg cadastroSucess">
            O seu cadastro foi efetuado com sucesso.<br>
            Agora você pode cadastrar suas vagas em republicas para serem 
            divulgadas.
        </div>
        <?php else : ?>
        <div class="cadastroMsg cadastroFailed">
            Pedimos desculpas pelo transtorno.<br>
            Mas parece que ocorreu algum erro no momento do seu cadastro.
            Por favor tente novamente mais tarde.
        </div>
        <?php endif ; ?>
    </div> 

    <div class="modal-footer">
        <?php if( $_POST['div'] > 0 ) : ?>
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
        <?php else : ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <?php endif ; ?>
    </div>       
</div>  
 