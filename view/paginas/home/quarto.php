<?php
$getHeader = array(
    'local'      => 'home',
    'components' => array(),
);

$this->getHeader( $getHeader );
?>

<section id="quarto">
    <?php foreach ($this->quarto as $quarto => $dados): ?>
    <div class="quarto-container">
        
        <div class="quarto-capa">
            <div class="quarto-capa-container cover-img" style="background-image: url('<?=$dados[2]->imagens[$dados[2]->capa]?>')">

            </div>
        </div>
        
        <div class="quarto-sumario">
            
            <div class="quarto-sumario-container">
                
                <div class="row">
                    <div class="col-md-8">
                        
                        <div class="quarto-resumo">
                            
                            <div class="quarto-title">
                                <h1>
                                    Quarto <?=$dados[0]->tipoQuarto?>
                                </h1>
                            </div>
                            
                            <div class="quarto-subtitle">
                                <h3>
                                    <?=$dados[1]->cidade. ", " .$dados[1]->estado?>
                                </h3>
                            </div>
                            
                            <div class="quarto-pinfos">
                                <div class="row">
                                    <div class="quarto-pinfos-icons">
                                        
                                        <div class="col-sm-2">
                                            <?php if( $dados[0]->tipoPropriedade == "casa" ): ?>
                                            <i class="fa fa-home"></i>
                                            <?php else :?>
                                            <i class="fa fa-building-o"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-2"><i class="fa fa-users"></i></div>
                                        <div class="col-sm-2"><i class="fa fa-cube"></i></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="quarto-pinfos-desc">
                                        
                                        <div class="col-sm-2"><?=$dados[0]->tipoPropriedade?></div>
                                        
                                        <div class="col-sm-2">
                                            <?php if( $dados[0]->numeroDeVagas ):
                                                echo $dados[0]->numeroDeVagas . " Vagas";
                                            ?>
                                            <?php else :?>
                                            1 Vaga
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <?php if( $dados[0]->comodidades == 'null'): ?>
                                            Mobiliado
                                            <?php else :?>
                                            Não Mobiliado
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        
                        <div class="quarto-box">
                            <div class="quarto-box-container">
                                
                                <div class="quarto-box-content">
                                    
                                    <div class="box-header">
                                        
                                        <div class="row">
                                            
                                            <div class="col-sm-7">R$ <?=$dados[0]->valorAluguel?></div>
                                            <div class="col-sm-5">Por mês</div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-main">
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box-main-container has-feedback">
                                                    <input placeholder="E-mail" type="text" class="form-control" id="email-contato-vaga">
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-footer">
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <button class="btn btn-default">Notificar interesse</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="quarto-detalhes">
            <div class="quarto-detalhes-container">
                
                <div class="row">
                                    
                    <div class="col-md-8">
                        
                        <div class="quarto-detalhes-detalhes">
                            <h1>
                                Sobre este quarto
                            </h1>
                            
                            <div class="sobre">
                                <p>
                                   <?=$dados[0]->sobreQuarto?>
                                </p>
                                
                                <h5 id="more-details">
                                    Mais detalhes
                                </h5>
                            </div>
                           
                            
                            <div class="comodides item-detalhes">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>
                                            Comodidades
                                        </h3>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        
                                        <div class="comodidades-desc">
                                            
                                            <?php if ( is_array($dados[0]->comodidades) ): ?>
                                            
                                                <?php foreach ($dados[0]->comodidades as $comodidade => $val) : ?>

                                                <div class="col-md-6 item comodidades-item">
                                                    <?=$comodidade?>
                                                </div>

                                                <div class="col-md-6 item comodidades-item">
                                                    <?php if ($val == 'true') :?>
                                                    <i class="fa fa-check-square"></i>&nbsp;
                                                    <?php else : ?>
                                                    <i class="fa fa-minus-square"></i>&nbsp;
                                                    <?php endif; ?>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                Sem descrição de comodidades
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        
                            <div class="mobilia item-detalhes">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>
                                            Mobilia do quarto
                                        </h3>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        
                                        <div class="mobilia-desc">
                                            
                                            <div class="col-md-12 item mobilia-item">
                                                <?php if($dados[0]->mobiliaQuarto == 'null'): ?>
                                                    Sem descrição de mobilia
                                                <?php else :
                                                    echo $dados[0]->mobiliaQuarto;
                                                endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="regras item-detalhes">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>
                                            Regras e Rotinas da casa
                                        </h3>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        
                                        <div class="regras-desc">
                                            
                                            <div class="col-md-12 item regras-item">
                                                <?=$dados[0]->regrasRotinas?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="despesas item-detalhes">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>
                                            Despesas
                                        </h3>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        
                                        <div class="despesas-desc">
                                            
                                            <div class="col-md-12 item despesas-item">
                                                <?php if( $dados[0]->descDespesas == 'null'): ?>
                                                    Sem descrição de despesas
                                                <?php else: 
                                                    echo $dados[0]->descDespesas;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="aluguel item-detalhes">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>
                                            Aluguel
                                        </h3>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        
                                        <div class="aluguel-desc">
                                            
                                            <div class="col-md-12 item aluguel-item">
                                                <?php if( $dados[0]->descAluguel == 'null'): ?>
                                                    Sem descrição de aluguel
                                                <?php else: 
                                                    echo $dados[0]->descAluguel;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="quarto-fotos">
            <div class="quarto-fotos-container">
                
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>

<?php
$getFooter = array(
    'local'      => 'home',
    'components' => array(),
    'js'         => array(
        'ajax-logoff-usuario'
    )
);

$this->getFooter( $getFooter ); 
?>