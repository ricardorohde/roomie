<?php

    /*
     * Inlude das configurações e funções do sistemas
     */
    include "./config.php";
    include "./functions.php";
    
    /*
     * Função para conferir se existe cookie para a seção do usuario
     */
    Cookie::confere_login_cookie();
    
    /*
     * Apaga caso exista campos na url vazios
     * Ex: localhost/Roomie/home/////
     */
    if( isset( $_GET['c'] ) ) {
        
        $url = explode( "/", $_GET['c'] );
        
        foreach ( $url as $key => $value ){
            
            if( $value == "" ){
                
                unset( $url[ $key ] );
            }
        }
    }
    
    /*
     * Tratamento para url, dividindo ela em partes para definir o que sera feito no sistema
     */
    if( is_array( $url ) ){
        
        foreach ( $url as $indice => $valor){
            
            $controller_ = ($indice == 0) ? url( $valor ): $controller_ ;
            $method      = ($indice == 1) ? url( $valor ): $method;
            
            if($indice != 0 && $indice != 1){
                $parans[] = $valor;
            }
        }
    }
    
    /*
     * instancia o controller
     */
    $controller = new $controller_();
    
    /*
     * chama o metodo que carregara a view
     */
    header('Content-Type: text/html; charset=utf-8');
    $controller->{ $method }( $parans );