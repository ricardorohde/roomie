<?php 
    
    /*Array com as informações do header como local, paginas css, css auxiliar etc
     *
     * @parans:
     * local             -> qual header carregar
     * components(array) -> array com nomes dos components a carregar 
     */
    $getHeader = array(
        'local'      => 'home',
        'components' => array(),
    );

    $this->getHeader( $getHeader ); 
?>

<div class="homeSearch">

    <div class="containerHomeSearch">

        <h1>Aonde você quer morar?</h1>
    </div>

    <form method="post" id="formHomeSearch" action="<?=RAIZ?>pesquisa/resultado">

        <input name="statusDisponibilidade" value="1" hidden>

        <div id="containerFormTop" class="row">

            <div class="col-md-6">

                <div class="input-group">

                    <input class="form-control" placeholder="Cidade" id="InputHomeCidade" name="cidade" type="text">
                </div>
            </div>

            <div class="col-md-6">

                <div id="inputGroupTipoQuarto" class="input-group">

                    <input class="form-control" placeholder="Tipo de quarto" id="InputHomeTipoQuarto" name="tipoQuarto" type="text" readonly>
                    <span class="input-group-addon"> <i class="fa fa-chevron-down"></i> </span>
                    <div class="dropdownTQuarto" data-open="0">
                        <ul>
                            <li data-value="" style="height: 50px">------</li>
                            <li data-value="Individual" >Individual</li>
                            <li data-value="Compartilhado" >Compartilhado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <input placeholder="Valor Aluguel" id="InputHomeValor" name="valorAluguel" type="text">

        <div class="containerBtnHomeSearch">
            <input name="pesquisar" type="submit" id="btnHomeSearch" value="Pesquisar">
        </div>
    </form>
</div>

<?php
    
    $this->loadPage(array('pagina' => 'noticias-home'));
    
    $getFooter = array(
        'local'      => 'home',
        'components' => array(),
        'js'       => array(
            'ajax-logoff-usuario',
        )
    );

    $this->getFooter( $getFooter );
