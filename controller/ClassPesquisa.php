<?php
class Pesquisa extends Controller{   
   
    protected $quartos;
    
    #apenas para saber se a pesquisa ja foi efetuada, para exibir a msg
    protected $metodo;
    
    private $loadPage = array(
        'local'  => 'home',
        'pagina' => 'pesquisa'
    );
    
    public function __construct() {
        
        $this->quartos = new DAOQuartos();
    }


    public function index(){
        
        $this->quartos();
    }

    public function quartos() {
        
        $this->metodo = __FUNCTION__;
       
        $this->quartos = $this->quartos->SELECT(array( 'limit' => 6 ));
        
        $this->loadPage( $this->loadPage );
    }
    
    public function resultado() {
        
        $this->metodo = __FUNCTION__;
        
        foreach ($_POST as $campo => $valor){
            
            if(!$valor){
                
                $_POST[$campo] = null;
            }
        }
      
        $this->quartos = $this->quartos->SELECT($_POST);
        
        print_r($_POST);
        //$this->loadPage( $this->loadPage );
    }
}