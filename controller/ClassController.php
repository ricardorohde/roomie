<?php
class Controller{    

    /*
     * Metodo de carregamento de view
     * 
     * @param $loadPage: Array de parametros 
     * local  => local aonde se encontra a view(caso não seja passa um local sera puxado da pasta 'template')
     * pagina => A view a ser carregada
     * 
     * @author: Vinicius
     */
    protected function loadPage( $loadPage = array() ){
        
        if( !isset( $loadPage['local'] ) ){
            
            $loadPage['local'] = 'template';
        }
        
        include 'view/paginas/' . $loadPage['local'] . '/' . $loadPage['pagina'] . '.php';
    }
    
    /*
     * Faz a busca do cabecalho principal e outros
     * alterando sua exibição caso o usuario esteja logado ou não
     * caso queira incluir outro header basta informar nos parametros
     * 
     * @param $getHeader: array de parametros
     * pagina => informe a pagina qual deseja carregar o header (Ex. nome do arquivo: header-pagina)
     * 
     * @author: Vinicius
     */
    protected function getHeader( $getHeader = array() ){
        
        $login = false;
        
        if( $getHeader['local'] == 'home' ){

            if( isset($_SESSION['USUARIO']) ){

                $login = true;
            }
        }
        
        include 'view/paginas/header.php';
    }
    
    /*
     * Faz a busca do rodape principal e outros
     * caso queira incluir outro footer basta informar nos parametros
     * 
     * @param $args: array de parametros
     * pagina => informe a pagina qual deseja carregar o footer (Ex. nome do arquivo: footer-pagina)
     * 
     * @author: Vinicius
     */
    protected function getFooter( $getFooter = array() ){
        
        include 'view/paginas/footer.php';
    }

    /*
     * Metodo ira buscar todas as paginas css da view
     * 
     * @param $getCss: array de parametros
     * local     => informe a pagina qual deseja carregar o css principal (Ex. nome do arquivo: main-pagina.js);
     * component => caso queira carregar um component diferente (Ex. Bootstrap-social-icon);
     * 
     * os parametros sãoherdados da classe getHeader
     * 
     * @author: Vinicius
     */
    private function getCss( $getCss = array() ){
        
        /*
         * Fonts
         */
        echo ' <link href="' . RAIZ . 'view/css/fonts.css" rel="stylesheet" type="text/css"/>';      
        /*
         * Jquery UI AUTOCOMPLETE
         */
        echo '<link href="' . RAIZ . 'view/components/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>';         
        
        /*
         * Bootstrap
         */
        echo '<link href="' . RAIZ . 'view/components/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
        //echo '<link href="' . RAIZ . 'view/components/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>';
        
        /*
         * Font-Awesome
         */
        echo '<link href="' . RAIZ . 'view/components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">';

                
        /* 
         * CUSTONS CSS 
         * Css principal
         */
        if( file_exists( 'view/css/' . $getCss['local']  . '-main.css' ) ){
            
            echo '<link href="' . RAIZ . 'view/css/' . $getCss['local']  . '-main.css" rel="stylesheet" type="text/css"/>';
        }
        
        
        /*
         * Css de apoio a pagina atual
         */
        if ( isset ( $GLOBALS['url'][0] ) && file_exists( 'view/css/' . $getCss['local']  . '-' . $GLOBALS['url'][0] . '.css' ) ){
            
            echo '<link href="' . RAIZ . 'view/css/' . $getCss['local']  . '-' . $GLOBALS['url'][0] . '.css" rel="stylesheet" type="text/css"/>';
        }
        
        if ( isset ( $GLOBALS['url'][1] ) && file_exists( 'view/css/' . $getCss['local']  . '-' . $GLOBALS['url'][1] . '.css' ) ){
            
            echo '<link href="' . RAIZ . 'view/css/' . $getCss['local']  . '-' . $GLOBALS['url'][1] . '.css" rel="stylesheet" type="text/css"/>';
        }
        
        /*
         * Confere se existe alguma adição de css alem das padroes
         */
        if( isset( $getCss['components'] ) ){
            
            foreach ($getCss['components'] as $css) {
                
                echo '<link href="' . RAIZ . 'view/components/' . $css  . '.css" rel="stylesheet" type="text/css"/>';
            }
        }
    }
    
    /*
     * Metodo ira buscar todas as paginas js da view
     * 
     * @param $getJS: array de parametros
     * local     => informe a pagina qual deseja carregar o js (Ex. nome do arquivo: main-pagina.js);
     * component => caso queira carregar um component diferente (Ex. jquery-ui);
     * ajax      => array com os ajax a serem carregados na pagina
     * 
     * os parametros são herdados da classe getFooter
     * 
     * @author: Vinicius
     */
    private function getJs( $getJs = array() ){

        /*
         * Jquery
         */
        echo '<script src="' . RAIZ . 'view/components/jquery/jquery.js" type="text/javascript"></script>';        
        /*
         * Jquery mask
         */
        echo '<script src="' . RAIZ . 'view/components/jquery/jquery.mask.min.js" type="text/javascript"></script>';             
        /*
         * Jquery UI Auto-Complete
         */
        echo '<script src="' . RAIZ . 'view/components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>';   
        /*
         * Bootstrap
         */
        echo '<script src="' . RAIZ . 'view/components/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>';
        
        /*
         * Confere se existe alguma adição de js alem das padroes
         */
        if( isset( $getJs['components'] ) ){
            
            foreach ($getJs['components'] as $Js) {

                echo '<script src="' . RAIZ . 'view/components/' . $Js . '.js" type="text/javascript"></script>';
            }
        }
        
        /*
         * Confere se existe alguma adição de js dentro do documento
         */
        if( isset( $getJs['js'] ) ){
            $this->getSingleJs( $getJs['js'] );
        }
        
        /* 
         * CUSTONS JS 
         * Custom array cidades brasil
         */
        echo '<script src="' . RAIZ . 'view/js/cidades.js" type="text/javascript"></script>';    
        /*
         * Js Pincipal
         */
        if(file_exists( 'view/js/' . $getJs['local'] . '-main.js"' ) ){
            
            echo '<script src="' . RAIZ . 'view/js/' . $getJs['local'] . '-main.js" type="text/javascript"></script>';
        }
        
        /*
         * Js de apoio a pagina atual
         */
        if ( isset ( $GLOBALS['url'][0] ) && file_exists( 'view/js/' . $getJs['local']  . '-' . $GLOBALS['url'][0] . '.js' ) ){
            
            echo '<script src="' . RAIZ . 'view/js/' . $getJs['local']  . '-' . $GLOBALS['url'][0] . '.js" type="text/javascript"></script>';
        }
        if ( isset ( $GLOBALS['url'][1] ) && file_exists( 'view/js/' . $getJs['local']  . '-' . $GLOBALS['url'][1] . '.js' ) ){
            
            echo '<script src="' . RAIZ . 'view/js/' . $getJs['local']  . '-' . $GLOBALS['url'][1] . '.js" type="text/javascript"></script>';
        }
    }

    /*
     * Metodo ira buscar todas as paginas js caso precise de alguma importada dentro do documento
     * 
     * @param getSingleJs: array com os js's a serem carregados direto na pagina
     * 
     * Os parametros podem ser herdados da classe getFooter/getJs
     * Os não use comentarios em linha(//) nos arquivos js 
     * apenas em bloco, pois como o arquivo é minificado, 
     * havera erro na horade complilar
     * 
     * @author: Vinicius
     */
    protected function getSingleJs( $getSingleJs = array() ){
        
        foreach ( $getSingleJs as $file ){
            
            /*
             * Busca o conteudo do arquivo js solicitado
             */
            $js = file_get_contents('view/js/' . $file . '.js' );

            
            /*
             * Cria o arquivo em versão minificada
             */
            $js = str_ireplace( '\r\n',       '', trim( $js ) );
            $js = preg_replace( '/\s(?=\s)/', '', $js );
            
            /*
             * Carrega o arquivo na view
             */
            echo '<script data-file="' . $file . '" type="text/javascript">' . $js . '</script>';
        }
    }
}