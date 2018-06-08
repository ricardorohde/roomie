<?php

/*
 * função para carregar automaticamente classes
 */
function __autoload( $class_name ) {
    
    $dirs = array( 'controller', 'model');
        
    foreach ( $dirs as $dir ) {
            
        if( $dir == $dirs[0] && file_exists( $dir . '/Class' . $class_name . '.php' ) ){
        
            include $dir . '/Class' . $class_name . '.php';
            break;
        }
        else if( $dir == $dirs[1] && file_exists( $dir . '/class' . $class_name . '.php' ) ){
            
            include $dir . '/class' . $class_name . '.php';
            break;
        }
    }
}

/*
 * Função para buscar o titulo de acordo com a pagina que voce
 * se encontra
 */
function get_title( ){
    
    if( $GLOBALS['url'][0] == '' ){
        
        $title = '';
    }
    else{
        
        $title = ' - '. str_ireplace('-', ' ', $GLOBALS['url'][0]);
    }
    
    if( isset( $GLOBALS['url'][1] ) ){
        
        $title = ' - '. str_ireplace('-', ' ', $GLOBALS['url'][1]);
    }
    
    return TITLE . $title;
}
    
/*
 * Função que confere se existe uma seção ativa
 * esta função sera chamada para conferir se o usuario
 * esta logado, caso não, volta para a home
 * 
 * @author: Vinicius
 */
function confere_login(){

    if( !isset( $_SESSION['USUARIO'] ) ){

        header('location: ' . RAIZ);
    }
}

/*
 * Corta a url caso ela tenha '-'
 */
function url( $url = "teste-teste" ){
    
    return str_ireplace("-", "", $url);
}
    