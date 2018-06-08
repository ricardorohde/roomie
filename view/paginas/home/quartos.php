<?php echo ($this->metodo == "quartos") ? "<h2>Vagas recentes</h2>" : "<h2>Resultado para sua pesquisa</h2>" ?>

<?php if( is_array($this->quartos) ) : ?>

    <?php foreach ($this->quartos as $vagas => $dados) : ?>

        <div class="col-md-4">

            <div class="living_box">
                
                <!-- FOTO -->
                <?php if( ! $dados[2]->imagens[ $dados[2]->capa ]) : ?>
                    <div class="imgIndisponivel">
                        <i class="fa fa-picture-o"></i> Indisponivel
                    </div>
                <?php else :?>
                    <img src="<?=$dados[2]->imagens[ $dados[2]->capa ]?>" class="img-responsive" alt="">
                <?php endif; ?>
                
                <!-- TIPO DE PROPRIEDADE -->
                <span class="sale-box">
                    <span class="sale-label"><?=$dados[0]->tipoPropriedade?></span>
                </span>
                
                <!-- DESCCRIÇÃO (ENDEREÇO) -->
                <div class="living_desc">
                    <h3>
                        <a href="<?=RAIZ?>quarto/index/<?=$dados[0]->idQuarto?>">Quarto <?=$dados[0]->tipoQuarto?></a>
                    </h3>

                    <p>
                       <?=$dados[1]->cidade ?><br>
                       <?=$dados[1]->bairro ?><br>
                    </p>
                    <a href="<?=RAIZ?>quarto/index/<?=$dados[0]->idQuarto?>" class="btn3">Vizualizar vaga completa</a>
                    <p class="price">R$<?=$dados[0]->valorAluguel?></p>
                </div>
                
                <?php if( $dados[0]->comodidades ): ?>
                <table border="1" class="propertyDetails">
                    <tbody>
                        <tr>
                            <td>
                                <i class="fa fa-wifi" style="margin-right:7px;"></i>
                                internet
                                
                                <?php if($dados[0]->comodidades['internet']) : ?>
                                    <i style="color:green;" class="fa fa-check"></i>
                                <?php else : ?>
                                    <i style="color: #ce4844;" class="fa fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <i class="fa fa-desktop" style="margin-right:7px;"></i>
                                Tv
                                
                                <?php if($dados[0]->comodidades['televisao']) : ?>
                                    <i style="color:green;" class="fa fa-check"></i>
                                <?php else : ?>
                                    <i style="color: #ce4844;" class="fa fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <i class="fa fa-cube" style="margin-right:7px;"></i>
                                Mobiliado 
                                
                                <?php if($dados[0]->comodidades['mobilia']) : ?>
                                    <i style="color:green;" class="fa fa-check"></i>
                                <?php else : ?>
                                    <i style="color: #ce4844;" class="fa fa-times"></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border="1" class="propertyDetails">
                    <tbody>
                        <tr>
                            <td>
                                <i class="fa fa-tint" style="margin-right:7px;"></i>
                                Maquina de lavar
                                
                                <?php if($dados[0]->comodidades['maquina de lavar']) : ?>
                                    <i style="color: green;" class="fa fa-check"></i>
                                <?php else : ?>
                                    <i style="color: #ce4844;" class="fa fa-times"></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php else: ?>
                <table border="1" class="propertyDetails">
                    <tbody>
                        <tr>
                            <td>
                                <i style="color: #ce4844;" class="fa fa-times"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border="1" class="propertyDetails">
                    <tbody>
                        <tr>
                            <td>
                                Sem comodidades cadastradas
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    
    <div class="semVagasRecentes">
        <?php echo ($this->metodo == "quartos") ? "<h1>No momento não possuimos vagas recentemente cadastradas</h1>" : "<h2>Não foram encontradas vagas cadastradas com os parametros informados</h2>" ?>
    </div>
<?php endif;?>