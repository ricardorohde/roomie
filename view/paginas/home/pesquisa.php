<?php 
    
    /*
     * Array com as informações do header como local, paginas css, css auxiliar etc
     *
     * @parans:
     * local - qual header carregar
     * components(array) - array com nomes dos components a carregar
     * 
     */
    $getHeader = array(
        'local'      => 'home',
        'components' => array(),
    );

    $this->getHeader( $getHeader );
?>
        
<div class="formPesquisa">

    <div id="espaco" >&nbsp;</div>

    <div class="containerFormPesquisa">

        <form class="row" method="post" action="/Roomie/pesquisa/resultado">

            <input name="statusDisponibilidade" value="1" hidden>

            <div class="col-md-2 col">
                <div class="input-group">
                    <input class="form-control" name="cidade" type="text" id="InputHomeCidade" placeholder="Cidade" autocomplete="off">
                </div>
            </div>

            <div class="col-md-2 col">
                <div class="input-group">
                    <select class="form-control" name="tipoProp" class="tipoProp">

                        <option value="" selected>Tipo da propriedade</option>

                        <option value="casa">Casa</option>
                        <option value="apartamento">Apartamento</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2 col">
                <div class="input-group">
                    <select class="form-control" name="tipoQuarto" class="tipoQuarto">

                        <option value="" selected>Tipo do quarto</option>

                        <option value="individual">Individual</option>
                        <option value="compartilhado">Compartilhado</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2 col">
                <div class="input-group">
                    <input class="form-control" value="" name="valorAluguel" type="text" placeholder="Valor Aluguel" autocomplete="false">
                </div>
            </div>

            <div class="col-md-2 col submit">
                <div class="input-group">
                    <button class="btn btn-default form-control"><i class="fa fa-search"></i></button>
                </div>
            </div>

            <div class="col-md-2 pesquisaAvancada">
                <div class="input-group">
                    <button class="btn btn-default form-control">
                        <i class="fa fa-bars"></i> Pesquisa Avançada 
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="containerPesquisa">

    <div class="container">
        <div class="row">
            <?php include 'quartos.php' ?>
        </div>
    </div>  
</div>
        
<?php
    
    $getFooter = array(
        'local'      => 'home',
        'components' => array(),
        'js'       => array(
            'ajax-logoff-usuario'
        )
    );

    $this->getFooter( $getFooter ); 
