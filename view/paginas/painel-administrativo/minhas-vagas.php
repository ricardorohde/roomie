<?php
$getHeader = array(
    'local' => 'painel-administrativo'
);

$this->getHeader( $getHeader );
?>
<div class="containerMinhasVagas">
    
    <div class="sobre">
        
    </div>
    
    <div class="row">
        
        <?php if( is_array($this->minhasVagas) ) : ?>
        
            <?php foreach ($this->minhasVagas as $vaga => $dados) : ?>
                
                <div id="vaga<?=$dados[0]->idQuarto?>" class="col-md-4">
                    
                    <div class="boxVaga">
                        <div class="boxVagaHeader">

                            <?php if( ! $dados[2]->imagens[ $dados[2]->capa ] ) : ?>
                                <div class="imagemIndis">
                                    <i class="fa fa-picture-o"></i> Indisponivel
                                </div>
                            <?php else :?>
                                <div class="imagem">
                                    <img class="img-responsive" src="<?=$dados[2]->imagens[ $dados[2]->capa ]?>">
                                </div>
                            <?php endif; ?>

                            <h4 class="title"><?=$dados[0]->tipoPropriedade?> / <?=$dados[0]->tipoQuarto?></h4>
                            <h4 class="subTitle">Aluguel: R$<?=$dados[0]->valorAluguel?></h4>
                        </div>

                        <div class="boxVagaBody">
                            <b>Vagas:</b> <?=($dados[0]->numeroDeVagas ? $dados[0]->numeroDeVagas : 1); ?>
                        </div>

                        <div class="boxVagaFooter">
                            
                            <hr>
                            
                            <div class="btnAcoes" data-idvaga="<?=$dados[0]->idQuarto?>">
                                
                                
                                <button id="disponibilidade<?=$dados[0]->idQuarto?>" data-dispo="<?=$dados[0]->ativo?>" data-acao="alterarDisponibilidade" class="btn btn-warning">
                                    
                                    <?php if( $dados[0]->ativo == 1) : ?>
                                    <i class="fa fa-exclamation-circle"></i> Desativar 
                                    <?php else : ?>
                                    <i class="fa fa-flag-o"></i> Ativar
                                    <?php endif; ?>
                                </button>

                                <button data-acao="apagar" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i> Apagar
                                </button>

                                <a href="<?=RAIZ?>painel-administrativo/editar-vaga/<?=$dados[0]->idQuarto?>" id="editarVaga" data-acao="editar" class="btn btn-default">
                                    <i class="fa fa-pencil-square-o"></i> Editar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="semVagas">
                <center>
                    <h2>Você ainda não possui vagas cadastradas</h2>
                </center>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php 

$getFooter = array(
    'local'      => 'painel-administrativo',
    'components' => array(
        
    ),
    'js'       => array(
        'ajax-logoff-usuario',
        'ajax-minhas-vagas'
    )
);

$this->getFooter( $getFooter ); 