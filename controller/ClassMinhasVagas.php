<?php
class MinhasVagas extends Controller{
    
    private $idVaga;
    private $status;
    private $quarto;

    public function __construct() {
        
        $this->idVaga = $_POST['id'];
        
        if( isset($_POST['status']) ){
            
            if( $_POST['status'] ){
                
                $this->status = 0;
            }
            else{
                
                $this->status = 1;
            }
        }
        
        $this->quarto = new DAOQuartos();
        
        echo $this->$_POST['acao']();
    }

    public function apagar(){
        
        //return $this->quarto->( $this->idVaga );
    }
    
    public function alterarDisponibilidade(){
        
        $quartos = new Quartos;
        $quartos->idQuarto = $this->idVaga;
        $quartos->ativo    = $this->status;
        
        return $this->quarto->UPDATE( $quartos );
    }
}