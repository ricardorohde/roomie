<?php

class Quarto extends Controller{
    
    public $quarto;

    public function __construct( ) {
        
        $this->quarto = new DAOQuartos;
    }
    
    public function index( $id ){
        
        $this->quarto = $this->quarto->SELECT( array('idQuarto' => $id[0]) );
        
        $loadPage = array(
            'local' => 'home',
            'pagina'=> 'quarto'
        );
       
        $this->loadPage( $loadPage );
    }
}