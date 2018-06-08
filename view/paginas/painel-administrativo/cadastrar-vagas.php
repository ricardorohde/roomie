<?php
$getHeader = array(
    'local' => 'painel-administrativo',
    'components' => array()
);

$this->getHeader( $getHeader );
?>

<div class="TopoCadastroVagas">
    
    <div id="topoEtapa1" class="pEtapas">
        <h2>Anuncie suas vagas</h2>
        
        <p>Olá, você está prestes a cadastra vagas para um quarto, caso você possua mais de um quarto disponivel, faça o cadastro de um a um.</p>
        <p>Caso este quarto seja compartilhado, você deve apenas informar o numero de vagas disponiveis para ele.</p>
    </div>
    
    <div id="topoEtapa2" class="pEtapas" style="display: none">
        <h2>Fale sobre as acomodações da vaga</h2>
        
        <p>Está etapa de cadastro é a mais importante. Pois varios moradores buscam estas informações na hora de escolher uma moradia.</p>
        <p>Mas caso não queria divulgar estas informações, sinta-se avontade, todos os valores são opcionais.</p>
    </div>
    
    <div id="topoEtapa3" class="pEtapas" style="display: none">
        <h2>Envie fotos da sua vaga</h2>
        
        <p>Uma imagem vale mais do que mil palavras!</p>
        <p>A melhor maneira de atrair moradores para seu quarto é colocando fotos dele.</p>
    </div>
    
    <div id="topoEtapa4" class="pEtapas" style="display: none">
        <h2>Localização</h2>
        
        <p>Preencha com o campo cep e aguarde a busca pelo endereço.</p>
        <p>Caso seu cep não for encontrado os campos seram liberados para preenchimento manual</p>
    </div>
</div>

<div id="indicadorEtapas" class="row">
    
    <button data-topo="topoEtapa1" data-etapa="etapa1" class="btnIndicadorEtapas btnEtapaActive" disabled>1</button>
    
    <button data-topo="topoEtapa2" data-etapa="etapa2" class="btnIndicadorEtapas">2</button>
    
    <button data-topo="topoEtapa3" data-etapa="etapa3" class="btnIndicadorEtapas">3</button>
    
    <button data-topo="topoEtapa4" data-etapa="etapa4" class="btnIndicadorEtapas">4</button>
</div>

<div class="divFormCadastroVagas">
    
    <form id="fomCadastroVagas">
        
        <!-- form Etapa 1 -->
        <input name="tipoPropriedade" class="inputTipoPropriedade textForm" type="text" value="" hidden>
        <input name="tipoQuarto" class="inputTipoQuarto textForm" type="text" value="" hidden>
        <input name="numeroDeVagas" class="inputNumVagas textForm" type="text" value="" hidden>
        <input name="genero" class="inputGenero textForm" type="text" value="" hidden>
        <input name="valorAluguel" class="inputValor textForm" type="text" value="" hidden>        
        <textarea name="descAluguel" class="inputDescrValor textForm" hidden></textarea>        
        <input name="valorDespesas" class="inputDespesas textForm" type="text" value="" hidden>        
        <textarea name="descDespesas" class="inputDescrDespesas textForm" hidden></textarea>
        
        <!-- form Etapa 2 -->
        <input name="comodidades[televisao]" class="inputTelevisao textForm" type="text" value="" hidden>
        <input name="comodidades[internet]" class="inputInternet textForm" type="text" value="" hidden>
        <input name="comodidades[maqLavar]" class="inputMaqLavar textForm" type="text" value="" hidden>
        <input name="comodidades[mobilia]" class="inputMobilia textForm" type="text" value="" hidden>
        <textarea name="mobiliaQuarto" class="inputDescrMobilia textForm" hidden></textarea>
        <textarea name="comodidades[OutrasComodidades]" class="inputOutrasComodidades textForm" hidden></textarea>
        <textarea name="regrasRotinas" class="inputRegrasRotinas textForm" hidden></textarea>
        <textarea name="sobreQuarto" class="inputSobreQuarto textForm" hidden></textarea>
        
        <!-- form Etapa 3 -->
        <input name="imagens[]" class="inputImages" type="file" id="imagens" style="display:none;" multiple>

        <!-- form Etapa 4-->
        <input name="cep" class="inputCep textForm" type="text" value="" hidden>
        <input name="rua" class="inputRua textForm" type="text" value="" hidden>
        <input name="bairro" class="inputBairro textForm" type="text" value="" hidden>
        <input name="cidade" class="inputCidade textForm" type="text" value="" hidden>
        <input name="estado" class="inputEstado textForm" type="text" value="" hidden>
        <textarea name="dadosAdicionais" class="inputDadosAdicionais textForm" hidden></textarea>
    </form> 
        
    <div class="containerFormCadastroVagas">
        
        <!-- LAYOUT ETAPA1 -->
        <div id="etapa1" class="etapas">
            
            <div id="divTipoPropriedade" class="row">

                <div class="formCadastroVagasTitle">
                    Tipo da Propriedade 
                </div>

                <div class="btn-group">

                    <button style="width: 156px;" class="btnTipoPropriedade btn btnClick" data-input="inputTipoPropriedade" data-value="casa" data-checked=0>

                        <i class="fa fa-home"></i>

                        Casa
                    </button>

                    <button style="width: 202px;" class="btnTipoPropriedade btn btnClick" data-input="inputTipoPropriedade"  data-value="apartamento" data-checked=0>

                        <i class="fa fa-building-o"></i>

                        Apartamento
                    </button>
                </div>
            </div>

            <div id="divTipoQuarto" class="row">

                <div class="formCadastroVagasTitle">
                    Tipo do Quarto
                </div>

                <div class="btn-group">
                    <button class="btnTipoQuarto btn btnClick" data-input="inputTipoQuarto" data-value="individual" data-checked=0>

                        <i class="fa fa-user"></i>

                        Individual
                    </button>

                    <button class="btnTipoQuarto btn btnClick" data-input="inputTipoQuarto" data-value="compartilhado" data-checked=0>

                        <i class="fa fa-users"></i>

                        Compartilhado
                    </button>
                </div>
            </div>

            <div id="divNumVagas" class="row" disable>

                <div class="formCadastroVagasTitle">
                    Numero de vagas disponiveis
                </div>

                <div class="btn-group">

                    <div class="titleBtnGroup">
                        <i class="fa fa-bed"></i>
                    </div>

                    <button class="btnNumVagas btn btnClick" data-input="inputNumVagas" data-value="1" data-checked=0 disabled>1</button>
                    <button class="btnNumVagas btn btnClick" data-input="inputNumVagas" data-value="2" data-checked=0 disabled>2</button>
                    <button class="btnNumVagas btn btnClick" data-input="inputNumVagas" data-value="3" data-checked=0 disabled>3</button>
                    <button class="btnNumVagas btn btnClick" data-input="inputNumVagas" data-value="4" data-checked=0 disabled>4</button>
                    <button class="btnNumVagas btn btnClick" data-input="inputNumVagas" data-value="5+" data-checked=0 disabled>5+</button>
                </div>
            </div>
            
            <div id="divGenero" class="row">

                <div class="formCadastroVagasTitle">
                    Genero
                </div>

                <div class="btn-group">
                    <button class="btn btnClick" data-input="inputGenero" data-value="feminino" data-checked=0>
                        <i class="fa fa-female"></i>
                        Feminino
                    </button>

                    <button class="btn btnClick" data-input="inputGenero" data-value="masculino" data-checked=0>
                        <i class="fa fa-male"></i>
                        Masculino
                    </button>
                    
                    <button class="btn btnClick" data-input="inputGenero" data-value="mista" data-checked=0>
                        <i class="fa fa-female" style="margin-right: -10px;"></i>
                        <i class="fa fa-male"></i>
                        Mista
                    </button>
                </div>
            </div>

            <div id="divValor" class="row">

                <div class="formCadastroVagasTitle">
                    Valor Aluguel                 
                </div>

                <div class="btn-group">
                    <div class="titleBtnGroup">
                        <i class="fa fa-dollar"></i>
                    </div>

                    <div class="btnValor btn">
                        <span>R$</span><input class="inputsButtons" data-input="inputValor" type="text" id="valor" value="">
                    </div>
                    
                    <button class="btn textArea" data-input="inputDescrValor" style="width: 218px; ">
                        Descrever aluguel
                    </button>
                </div>
            </div>
            
            <div id="divDespesas" class="row">

                <div class="formCadastroVagasTitle">
                    Total de despesas                 
                </div>

                <div class="btn-group">
                    <div class="titleBtnGroup">
                        <i class="fa fa-dollar"></i>
                    </div>

                    <div class="btnValor btn">
                        <span>R$</span><input class="inputsButtons" data-input="inputDespesas" type="text" id="valorDespesas" value="">
                    </div>
                    
                    <button class="btn textArea" data-input="inputDescrDespesas">
                        Descrever Despesas
                    </button>
                </div>
            </div>
            
            <div id="indicadoresEtapas">
                <div class="avancar" data-topo="topoEtapa2" data-etapa="etapa2">
                    Avançar
                </div>
            </div>
        </div>
        <!-- / LAYOUT ETAPA1 -->
        
        <!-- LAYOUT ETAPA2 -->
        <div id="etapa2" class="etapas" style="display: none">
            
            <div id="divtelevisao" class="row">
                <div class="formCadastroVagasTitle">
                    Televisão             
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-desktop"></i>
                    </div>
                    
                    <button class="btn btnClick" data-input="inputTelevisao" data-value="true" data-checked=0>
                        <i class="fa fa-check-circle"></i>
                    </button>
                    <button class="btn btnClick" data-input="inputTelevisao" data-value="false" data-checked=0>
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div id="divInternet" class="row">
                <div class="formCadastroVagasTitle">
                    Internet             
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-wifi"></i>
                    </div>
                    
                    <button class="btn btnClick" data-input="inputInternet" data-value="true" data-checked=0>
                        <i class="fa fa-check-circle"></i>
                    </button>
                    <button class="btn btnClick" data-input="inputInternet" data-value="false" data-checked=0>
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div id="divMaqLavar" class="row">
                <div class="formCadastroVagasTitle">
                    Maquina de lavar             
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-tint"></i>
                    </div>
                    
                    <button class="btn btnClick" data-input="inputMaqLavar" data-value="true" data-checked=0>
                        <i class="fa fa-check-circle"></i>
                    </button>
                    <button class="btn btnClick" data-input="inputMaqLavar" data-value="false" data-checked=0>
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div id="divMobilia" class="row">
                <div class="formCadastroVagasTitle">
                    Quarto mobiliado
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-cube"></i>
                    </div>
                    
                    <button class="btn btnClick btnMobiliaQuarto" data-input="inputMobilia" data-value="true" data-checked=0>
                        <i class="fa fa-check-circle"></i>
                    </button>
                    <button class="btn btnClick btnMobiliaQuarto" data-input="inputMobilia" data-value="false" data-checked=0>
                        <i class="fa fa-times"></i>
                    </button>
                    
                    <button id="descricaoMobilia" class="btn textArea" data-input="inputDescrMobilia" disabled>
                        Descrever moveis
                    </button>
                </div>
            </div>
            
            <div id="divOutrasComodidades" class="row">
                <div class="formCadastroVagasTitle">
                   Outras comodidades
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-coffee"></i>
                    </div>
                    
                    <button id="descricaoItensCozinha" class="btn textArea" data-input="inputOutrasComodidades" style="width: 352px">
                        Descreva outras comodidades
                    </button>
                </div>
            </div>
            
            <div id="divRegrasRotinas" class="row">
                <div class="formCadastroVagasTitle">
                   Regras e rotinas
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-cog"></i>
                    </div>
                    
                    <button id="descricaoLimpeza" class="btn textArea" data-input="inputRegrasRotinas" style="width: 352px">
                        Descreva as regras e rotinas da casa
                    </button>
                </div>
            </div>
            
            <div id="divSobreQuarto" class="row">
                <div class="formCadastroVagasTitle">
                   Sobre o quarto
                </div>
                
                <div class="btn-group">
                    
                    <div class="titleBtnGroup">
                        <i class="fa fa-pencil-square-o"></i>
                    </div>
                    
                    <button id="outrasInformacoesComodidades" class="btn textArea" data-input="inputSobreQuarto" style="width: 352px">
                        Fale um pouco sobre o quarto
                    </button>
                </div>
            </div>
            
            <div id="indicadoresEtapas">
                <div class="avancar" data-topo="topoEtapa3" data-etapa="etapa3">
                    Avançar
                </div>

                <div class="voltar" data-topo="topoEtapa1" data-etapa="etapa1">
                    Voltar
                </div>
            </div>
        </div>
        <!-- / LAYOUT ETAPA2 -->
        
        <!-- LAYOUT ETAPA3 -->
        <div id="etapa3" class="etapas" style="display: none">
            
            <div class="row">
            
                <div class="container-fotos">
                    
                    <div id="divimagens" class="fotos btn" data-input="imagens">
                        <i class="fa fa-picture-o"></i>
                        Envie fotos da sua republica
                    </div>
                </div>
                
                <div id="fotos-enviadas">
                    <div class="container-fotos-enviadas">
                        
                    </div>
                </div>
            </div>
            
            <div id="indicadoresEtapas">
                <div id="salvarFotos" class="avancar" data-topo="topoEtapa4" data-etapa="etapa4">
                    Avançar
                </div>
            
                <div class="voltar" data-topo="topoEtapa2" data-etapa="etapa2">
                    Voltar
                </div>
            </div>
        </div>
        <!-- / LAYOUT ETAPA3 -->
        
        <!-- LAYOUT ETAPA4 -->
        <div id="etapa4" class="etapas" style="display: none">
            
            <div id="divCep" class="row">
                <div class="formCadastroVagasTitle">
                    Cep             
                </div>
                
                <div class="btn-group">
                    
                    <div class="btnValor btn">
                        <input autocomplete="false" data-input="inputCep" placeholder="Digite o cep" class="inputsButtons" data-input="inputCep" type="text" id="cep" value="">
                    </div>
                </div>
            </div>
            
            <div id="divRua" class="row">
                <div class="formCadastroVagasTitle">
                    Rua/Avenida             
                </div>
                
                <div class="btn-group">
                    
                    <div class="btnValor btn">
                        <input autocomplete="false" data-input="inputRua" placeholder="Av. Afonso Pena, R. Juiz de fora..." class="inputsButtons" data-input="inputRua" type="text" id="rua" value="">
                    </div>
                </div>
            </div>
            
            <div id="divBairro" class="row">
                <div class="formCadastroVagasTitle">
                    Bairro             
                </div>
                
                <div class="btn-group">
                    
                    <div class="btnValor btn">
                        <input autocomplete="false" data-input="inputBairro" placeholder="Pampulha, Morumbi..." class="inputsButtons" data-input="inputBairro" type="text" id="bairro" value="">
                    </div>
                </div>
            </div>
            
            <div id="divEstado" class="row">
                <div class="formCadastroVagasTitle">
                    Estado             
                </div>
                
                <div class="btn-group">
                    
                    <div class="btnValor btn">
                        <input autocomplete="false" data-input="inputEstado" placeholder="Minas Gerais, São Paulo, RJ..." class="inputsButtons" data-input="inputEstado" type="text" id="estado" value="">
                    </div>
                </div>
            </div>
            
            <div id="divCidade" class="row">
                <div class="formCadastroVagasTitle">
                    Cidade             
                </div>
                
                <div class="btn-group">
                    
                    <div class="btnValor btn">
                        <input autocomplete="false" data-input="inputCidade" placeholder="Belo Horizonte, São Paulo..." class="inputsButtons" data-input="inputCidade" type="cidade" id="cidade" value="">
                    </div>
                </div>
            </div>
            
            <div id="divOutrosEndereco" class="row">
                <div class="formCadastroVagasTitle">
                    Outras informações             
                </div>
                
                <div class="btn-group">
                    
                    <button class="btn textArea" data-input="inputDadosAdicionais">
                        Descrever outras informações do endereço
                    </button>
                </div>
            </div>

            <div id="indicadoresEtapas">
                <div class="salvar">
                    Salvar
                </div>
                
                <div class="voltar" data-topo="topoEtapa3" data-etapa="etapa3">
                    Voltar
                </div>
            </div>
        </div>
        <!-- / LAYOUT ETAPA4 -->
    </div>
</div>
<?php
$this->loadPage(array('pagina' => 'modal-text-area'));
$this->loadPage(array('pagina' => 'modal-cadastro-quarto'));
$this->loadPage(array('pagina' => 'modal-imagem'));

$getFooter = array(
    'local'      => 'painel-administrativo',
    'components' => array(),
    'js'         => array(
        'ajax-cadastro-vaga',
        'ajax-logoff-usuario'
    )
);

$this->getFooter( $getFooter ); 
