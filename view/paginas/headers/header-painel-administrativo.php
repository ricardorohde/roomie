<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">


                <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    <?=$_SESSION['USUARIO'][0]->nome?> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-user">

                    <li><a href="<?=RAIZ?>painel-administrativo/editar-perfil/<?=$_SESSION['USUARIO'][0]->idUsuario?>"><i class="fa fa fa-pencil fa-fw"></i> Editar perfil</a></li>

                    <li><a href="#"><i class="fa fa-file-text-o fa-fw"></i> Termos de uso</a></li>

                    <li class="divider"></li>
                    <li><a id="logoffUsuario" href=""><i class="fa fa-sign-out fa-fw"></i> Sair</a> </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default" role="navigation">

            <div class="menu-nav navbar-collapse">

                <ul class="nav" id="menu">

                    <li id="logo">
                        <a href="<?=RAIZ?>">Roomie</a>
                    </li>

                    <li>
                        <a href="<?=RAIZ?>painel-administrativo/"><i class="fa fa-inbox fa-fw"></i> Notificações</a>
                    </li>

                    <li>
                        <a href="<?=RAIZ?>painel-administrativo/cadastrar-vagas"><i class="fa fa-home fa-fw"></i> Cadastrar vagas</a>
                    </li>

                    <li>
                        <a href="<?=RAIZ?>painel-administrativo/minhas-vagas"><i class="fa fa-bed fa-fw"></i> Minhas vagas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- / Navigation -->


    <!-- Pagina Selecionada(Ferramenta) -->
    <div id="page-wrapper">

        <div class="container-fluid">