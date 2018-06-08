<div class="containerFormCadastroUsuario">
              
    <div class="modal-header">
        <p id="titleModalCadastro" class="modal-title">Cadastre-se com o <a id="btn-facebbok-login" href="#">Facebook</a></p>
    </div>
    
    <br>

    <form>

        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control nome" id="pNome" placeholder="Nome" name="nome">
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control nome" id="sNome" placeholder="Sobrenome" name="sobrenome">
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>             
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="telefone" placeholder="Telefone (opcional)" name="telefone">
                <span class="glyphicon glyphicon-phone form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="dataNasc" placeholder="Data de nascimento" name="dataNasc">
                <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" class="form-control senha" id="senha" placeholder="Senha" name="senha">
                <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" class="form-control senha" id="confSenha" placeholder="Confirmar senha" name="confSenha">
                <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-12 termos">
                Ao realizar seu cadastro, você concorda com os 
                <a href="#">Termos de Serviço</a> do Roomie,
                <a href="#">Política de Privacidade</a>, 
                <a href="#">Política de Reembolso do  Hóspede</a> e 
                <a href="#">Termos da Garantia ao Anfitrião</a>.
            </div>
        </div>
        
        <br>
        
        <div class="modal-footer">
            <span id="loadingCadastroUsuario"></span> <span class="btn" id="btnCadastrarUsuario">Cadastrar-se</span>
        </div>       
    </form>
</div> 

<?php

$getSingleJs = array(
    'facebook-api',
    'ajax-' . $pagina[0],
);

$this->getSingleJs($getSingleJs);