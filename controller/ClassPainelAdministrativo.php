<?php
class PainelAdministrativo extends Controller {
    
    protected $minhasVagas;
    
    protected $idUsuario;

    public function __construct() {
        
        confere_login();
    }

    //LOADING DAS PAGINAS
    public function index() {
        
        $args = array(
            'local' => 'painel-administrativo',
            'pagina'=> 'home'
        );
       
        $this->loadPage( $args );
    }    
    
    public function minhasVagas() {
        
        $this->minhasVagas = new DAOQuartos;
        
        $this->minhasVagas = $this->minhasVagas->SELECT( array( 'tUsuarios_idUsuario' => $_SESSION['USUARIO'][0]->idUsuario ) );
                
        $args = array(
            'local' => 'painel-administrativo',
            'pagina'=> 'minhas-vagas'
        );
       
        $this->loadPage( $args );
    }
    
    public function editarVaga( $idQuarto ){
        
        $this->minhasVagas = new DAOQuartos;
        
        $quarto = array(
            'tUsuarios_idUsuario' => $_SESSION['USUARIO'][0]->idUsuario,
            'idQuarto'  => $idQuarto[0]
        );
        
        $this->minhasVagas = $this->minhasVagas->SELECT($quarto);
        
        $args = array(
            'local' => 'painel-administrativo',
            'pagina'=> 'editar-vaga'
        );
       
        $this->loadPage( $args );
    }
    
    public function cadastrarVagas() {
        
        $args = array(
            'local' => 'painel-administrativo',
            'pagina'=> 'cadastrar-vagas'
        );
        
        $this->loadPage( $args );
    }
    
    public function editarPerfil( $id ){
        
        $this->idUsuario = $id;
        
        $args = array(
            'local' => 'painel-administrativo',
            'pagina'=> 'editar-perfil'
        );
       
        $this->loadPage( $args );
    }
}