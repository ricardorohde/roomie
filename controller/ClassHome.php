<?php
class Home extends Controller{   
    
    protected $quartos;
    
    public function __construct() {
        
        $this->quartos = new DAOQuartos();
    }

    public function index() {
        
        $this->quartos = $this->quartos->SELECT(array(
            'limit' => 4
        ));
       
        $loadpage = array(
            'local' => 'home',
            'pagina'=> 'home'
        );
       
        $this->loadPage( $loadpage );
    }
}