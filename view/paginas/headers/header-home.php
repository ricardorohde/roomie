<?php     
    $this->loadPage(array(
        'local'  => 'template',
        'pagina' => 'modal'
    ));
    
    if( !$login ): 
?>
    <div class="header">

        <div class="responsiveMenuBars col-md-2">
            <div class="btn btn-default">
                <i class="fa fa-bars"></i>
            </div>
        </div>

        <div class="responsiveMenu" data-view="0">
            <div class="menuResponsive">
                <ul>
                    <li><a href="<?=RAIZ?>">Home</a></li>
                    <li><a href="<?=RAIZ?>pesquisa">Encontre uma republica</a></li>
                </ul>
            </div>
        </div>

        <div class="logo col-md-2">
            <h2>
                <a href="<?=RAIZ?>"> <img id="r" src="<?=RAIZ?>view/imagens/R3.png">oomie </a>
            </h2>
        </div>

        <div class="menu col-md-4">
            <ul>
                <li><a href="<?=RAIZ?>">Home</a></li>
                <li><a href="<?=RAIZ?>pesquisa">Encontre uma republica</a></li>
            </ul>
        </div>

        <div class="col-md-3 header-right">

            <div class="btn-usr">           

                <a data-toggle="modal" data-target="#modal" id="Logar" href="<?=RAIZ?>Ajax/load/login-usuario">
                    <!--<i class="fa fa-sign-in"></i>-->
                    <span class="glyphicon glyphicon-user"></span>
                    Entre
                </a>
            </div>

            <div class="btn-usr">

                <a data-toggle="modal" data-target="#modal" id="cadastroUsuario" href="<?=RAIZ?>Ajax/load/cadastro-usuario">
                    <!--<i class="fa fa-user-plus"></i>-->
                    <span class="glyphicon glyphicon-plus"></span>
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>

<?php else :?>
    <div class="header">

        <div class="responsiveMenuBars col-md-2">
            <div class="btn btn-default">
                <i class="fa fa-bars"></i>
            </div>
        </div>

        <div class="responsiveMenu" data-view="0">
            <div class="menuResponsive">
                <ul>
                    <li><a href="<?=RAIZ?>">Home</a></li>
                    <li><a href="<?=RAIZ?>pesquisa">Encontre uma republica</a></li>
                </ul>
            </div>
        </div>

        <div class="logo col-md-2">
            <h2>
                <a href="<?=RAIZ?>"> <img id="r" src="<?=RAIZ?>view/imagens/R3.png">oomie</a>
            </h2>
        </div>

        <div class="menu col-md-4">
            <ul>
                <li><a href="<?=RAIZ?>">Home</a></li>
                <li><a href="<?=RAIZ?>pesquisa">Encontre uma republica</a></li>
            </ul>
        </div>

        <div class="header-right col-md-3">

            <div class="btn-usr-logado">
                <span id="avatar" class="glyphicon glyphicon-user"></span>

                <div class="dropdown">

                    <a class="dropdown-toggle"  id="menuUsuario" data-toggle="dropdown">
                        <?=$_SESSION['USUARIO'][0]->nome;?>
                        <span class="caret"></span>
                    </a>           

                    <ul class="dropdown-menu" role="menu" aria-labelledby="menuUsuario">

                        <li><a href="<?=RAIZ?>painel-administrativo/">Painel</a></li>

                        <li><a href="<?=RAIZ?>painel-administrativo/cadastrar-vagas">Anunciar uma vaga</a></li>

                        <li><a href="<?=RAIZ?>painel-administrativo/minhas-vagas">Minhas vagas</a></li>

                        <li><a href="<?=RAIZ?>painel-administrativo/editar-perfil/<?=$_SESSION['USUARIO'][0]->idUsuario?>">Editar perfil</a></li>

                        <li class="divider"></li>
                        <li><a id="logoffUsuario" href="#">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>