<div class="content_middle">
    <div class="container">
        <div class="content_middle_box">
            
            <div class="top_grid">
                <div class="col-md-6">
                    
                    <div class="grid1">
                        
                        <div class="index_img_bottom">
                            <img src="view/imagens/pic4.jpg" class="img-responsive" alt=""/>
                        </div>
                        
                        <i class="m_home"> </i>
                        
                        <div class="inner_wrap1">
                            <ul class="item_module">
                                
                                <li class="module_left"></li>
                                <li class="module_right">
                                    <h5>Está procurando um quarto em uma casa?</h5>
                                    <p>
                                        Para você que prefere conviver em um espaço sem regras impostas por condomínios, maior espaço e liberdade.
                                    </p>
                                </li>
                                
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    
                    <div class="grid1">
                        
                        <div class="index_img_bottom1">
                            <img src="view/imagens/pic5.jpg" class="img-responsive" alt=""/>
                        </div>
                        
                        <i class="m_home1"> </i>

                        <div class="inner_wrap1">
                            
                            <ul class="item_module">
                                
                                <li class="module_left"></li>
                                <li class="module_right">
                                    <h5>Ou um apartamento seria melhor?</h5>
                                    <p>
                                        Para você que se da bem com regras e vizinhos, e preza pelo sentimento de segurança.
                                    </p>
                                </li>
                                
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                   </div>
                </div>
                             
                <div class="clearfix"> </div>
            </div>         
<!--======================================================================================================================-->
            
            <div class="middle_grid">
                
                <div class="middle_grid_title">
                    <h2>
                        Vagas em destaque
                    </h2>
                </div>
                
                <?php if( is_array($this->quartos) ) : ?>

                    <?php foreach ($this->quartos as $vagas => $dados) : ?>
                        <div class="col-md-3">
                            
                            <div class="grid1">
                                <a href="<?=RAIZ?>quarto/index/<?=$dados[0]->idQuarto?>">
                                    <div class="view view-first">

                                        <div class="index_img_top">
                                            <img src="<?=$dados[2]->imagens[$dados[2]->capa]?>" class="img-responsive" alt=""/>
                                        </div>

                                        <?php if ( $dados[0]->tipoPropriedade == "casa") : ?>
                                        <div class="sale">R$<?=$dados[0]->valorAluguel?></div>
                                        <div class="mask">

                                        <?php else : ?>
                                        <div class="sale1">R$<?=$dados[0]->valorAluguel?></div>
                                        <div class="mask1">
                                        <?php endif; ?>

                                            <div class="info">
                                                <i class="fa fa-eye"></i> ver vaga
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                                <?php if ( $dados[0]->tipoPropriedade == "casa") : ?>
                                <i class="home"> </i>
                                <?php else : ?>
                                <i class="home1"> </i>
                                <?php endif; ?>
                                
                                <div class="inner_wrap">

                                    <h3>
                                        <?php if($dados[1]->estado != 'null' || $dados[1]->cidade != 'null' ): ?>
                                        
                                            <?=$dados[1]->estado?> <?=$dados[1]->cidade?>
                                        <?php else : ?>
                                        
                                            <br>
                                        <?php endif; ?>
                                    </h3>

                                    <ul class="star1">
                                        <?php if ( $dados[0]->tipoPropriedade == "casa") : ?>
                                        <h4 class="green">
                                        <?php else : ?>
                                        <h4 class="yellow">
                                        <?php endif; ?>
                                            Quarto <?=$dados[0]->tipoQuarto?>
                                        </h4>
                                        
                                        <li> 
                                            <a href="<?=RAIZ?>quarto/index/<?=$dados[0]->idQuarto?>"> 
                                               Vagas <?php echo ($dados[0]->numeroDeVagas  ?  "<i class='fa fa-users'></i> (".$dados[0]->numeroDeVagas.")" :  "<i class='fa fa-user'></i> (1)"); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
    
                    <div class="semVagasRecentes">
                        <h2>No momento não possuimos vagas recentemente cadastradas</h2>
                    </div>
                <?php endif;?>
            
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>