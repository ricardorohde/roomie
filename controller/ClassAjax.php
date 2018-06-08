<?php

class Ajax extends Controller{
   
    public function load( $pagina ){
        
        include 'view/paginas/ajax/' . $pagina[0] .'.php';
    }
    
    public function iobj( $obj ){
        
        $objAjax = new $obj[0]($_POST, $_FILES);
    }
}