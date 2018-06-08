<?php
class cadastroVagas extends Controller{
    
    //Objetos model
    private $quarto;
    private $endereco;
    private $imagens;
    private $usuario;

    //recebe o $_POST
    private $post;
    private $files;

    //campos onde o erro ocorreu
    private $campos;
    private $erro   = false;
    
    public function __construct( $post, $files ) {
        
        $this->post  = $post;
        $this->files = $files;
        
        $this->quarto   = new Quartos();
        $this->endereco = new Enderecos();
        $this->imagens  = new Imagens();
        $this->usuario  = $_SESSION['USUARIO'][0];
        
        $this->set_comodidades();
        
        /*
         * Seta os campos obrigatorios
         */
        $this->campos = array(
            'Tipo Propriedade' => $this->set_campos_obrigatorios($post['tipoPropriedade'], 'tipoPropriedade'),
            'Valor Aluguel'    => $this->set_campos_obrigatorios($post['valorAluguel'],    'valorAluguel'),
            'Tipo Quarto'      => $this->set_campos_obrigatorios($post['tipoQuarto'],      'tipoQuarto'),
            'Genero'           => $this->set_campos_obrigatorios($post['genero'],          'genero'),
            'Sobre o Quarto'   => $this->set_campos_obrigatorios($post['sobreQuarto'],     'sobreQuarto'),
            'Regras e Rotinas' => $this->set_campos_obrigatorios($post['regrasRotinas'],   'regrasRotinas'),
        );

        if($post['tipoQuarto'] == 'compartilhado'){
            $this->campos['Numero de Vagas'] = $this->set_campos_obrigatorios($post['numeroDeVagas'], 'numeroDeVagas');
        }
        
        if($post['valorDespesas'] != 'null'){
            $this->campos['Descrição das Despesas'] = $this->set_campos_obrigatorios($post['descrDespesas'], 'descrDespesas');
        }
        
        $this->set_campos_opcionais();
        
        $this->verifica();
    }
    
    private function set_comodidades(){
        
        foreach ($this->post['comodidades'] as $comodidade => $valor){
            
            if( $valor != "null"){
                 
                $this->quarto->comodidades .= $comodidade . "=" . $valor . "&";
            }
        }
        
        unset( $this->post['comodidades'] );
    }
    
    private function set_imagens(){
        
        $imagens = new UploadImages();
        $this->imagens->imagens = implode("&", $imagens->addImages($this->files));
    }
    
    private function set_campos_obrigatorios( $valor, $campo ){
        
        if( $valor != "null" ){
            
            if( isset( $this->quarto->$campo ) ){
                
                $this->quarto->$campo = $valor;
            }
            else if( isset( $this->imagens->$campo ) ){
                
                $this->imagens->$campo = $valor;
            }
            else if( isset( $this->endereco->$campo ) ){
                
                $this->endereco->$campo = $valor;
            }
            
            unset( $this->post[$campo] );
            
            return true;
        }
        else{
            
            $this->erro = true;
            
            return false;
        }
    }
    
    private function set_campos_opcionais(){
        
        foreach ( $this->post as $campo => $valor ){
            
            if( isset( $this->quarto->$campo ) ){

                $this->quarto->$campo = $valor;
            }
            else if( isset( $this->imagens->$campo ) ){

                $this->imagens->$campo = $valor;
            }
            else if( isset( $this->endereco->$campo ) ){

                $this->endereco->$campo = $valor;
            }
        }

        unset( $this->post[$campo] );
    }
    
    private function cadastrar(){
        
        $this->set_imagens();
        $quarto = new DAOQuartos;
        
        $dados = array(
            $_SESSION['USUARIO'][0],
            $this->quarto,
            $this->endereco,
            $this->imagens
        );
        
        return $quarto->INSERT($dados);
    }

    private function verifica(){

        if( $this->erro ){

            foreach( $this->campos as $campo => $valor ) {

                if( !$valor ){

                    print $campo . "|";
                }
            }
        }
        else{

            return $this->cadastrar();
        }
    }
}