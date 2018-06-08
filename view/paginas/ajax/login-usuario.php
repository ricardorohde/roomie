<div class="containerFormLogin">
              
    <div class="modal-header">
        <p id="titleModalLogin" class="modal-title"></p>
    </div>
    
    <form id="formLoginUsuario">

        <div class="row">
            
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="emailLogin" placeholder="E-mail" name="emailLogin">
                <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-md-12 form-group">
                <input type="password" class="form-control" id="senhaLogin" placeholder="Senha" name="senhalogin">
                <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
            </div>             
        </div>
        
        <div class="row">
            
            <div id="rememberForgot" class="col-md-12 form-group">
                
                <label id="lembrar">
                    <input id="manterConectado" type="checkbox" name="conexao" value="manterConectado" checked>Lembre-se de mim
                </label>
                
                <a id="esqueceuSenha" href="#">Esqueceu a senha?</a>
            </div>
        </div>
    </form>
    
    <div id="btnloginfooter" class="modal-footer">
        <span class="btn" id="loadingLoginUsuario"><img src="/Roomie/view/imagens/loading.gif"></span> 
        <span class="btn" id="btnLoginUsuario">Entrar</span> 
    </div>

    <div class="footerLogin">
        <p>Você não tem uma conta? <a href="#">Cadastre-se</a></p>
    </div>  
</div>

<?php
    
    $getSingleJs = array( 
        'ajax' => 'ajax-' . $pagina[0] 
    );

    $this->getSingleJs($getSingleJs);