<?php
class CadastroUsuario extends Controller{
    
    //Objeto Usuario
    private $objUsuario;
    
    //dao usuario
    private $DaoUsuario;
    
    //campos onde o erro ocorreu
    private $campos = array();
    
    //msg de erro
    private $erros  = false;
   
    //construtor que recebe todos os inputs do $_POST
    public function __construct( $post ) {
       
        extract($post);
        
        //Criamos um objeto de banco para efetuar pequenas consultas
        $this->objUsuario = new Usuarios;
        
        //Criamos o dao usuario
        $this->DaoUsuario = new DAOUsuarios;

        //passa para seus metodos os valores para validação, e armazenando o retorno no metodo de mesmo nome em forma de array
        $this->campos['.nome']     = $this->SetNome( $pNome, $sNome );
        $this->campos['#email']    = $this->setEmail( $email );
        $this->campos['#telefone'] = $this->setTelefone( $telefone );
        $this->campos['#dataNasc'] = $this->setDataNasc( $dataNasc );
        $this->campos['.senha']    = $this->setSenha( $senha, $confSenha );
        
        $this->verificar();
    }
   
    //metodo que confere se o nome e valido
    private function SetNome($pNome, $sNome) {
       
        if($pNome == "" || $sNome == "") {
            
            $this->erros[] = "Nome ou sobrenome vazio!";
            return false;
        }
        else{

            $this->objUsuario->nome = $pNome . " " . $sNome;
            return true;
        }
    }
    
    //metodo que confere se o email esta correto
    private function setEmail($email){
        
        if($email == "") {
            
            $this->erros[] = "Campo email vazio!";
            return false;
        }
        else{
            
            if( ! strripos($email, "@") || ! strripos($email, ".") ) {
                
                $this->erros[] = "Email invalido!";
                return false;
            }
            else {                
                return $this->verificaEmail($email);
            }
        }
    }
    
    private function verificaEmail($email){
                
        if( is_array( $this->DaoUsuario->SELECT( array( 'email' => $email ) ) ) ) {
            
            $this->erros[] = "Email já cadastrado!";
            return false;
        }
        else {

            $this->objUsuario->email = $email;                
            return true;
        }
    }
    
    private function setTelefone($telefone){
  
        if(  strlen($telefone) > 1 && strlen($telefone) < 14 ){

            $this->erros[] = "Telefone invalido!";
            return false;
        }
        else{
            $this->objUsuario->telefones = $telefone;
            return true;
        }
    }
    
    private function setDataNasc($dataNasc){
        
        if( $dataNasc == "" ){
            
            $this->erros[] = "Data invalida!";
            return false;
        }
        else{
            
            $dataNasc = explode( "/", $dataNasc );
            
            $this->objUsuario->dataNascimento = "{$dataNasc[2]}-{$dataNasc[1]}-{$dataNasc[0]}";
            return true;
        }
    }
    
    private function setSenha($senha, $confSenha){
        
        if( $senha == ""){
            
            $this->erros[] = "Campo senha em branco!";
            return false;
        }
        else{
            
            if(strlen($senha) < 6 ){
                
                $this->erros[] = "Senha deve conter 6 caracteres ou mais!";
                return false;
            }
            else if($senha != $confSenha){
                
                $this->erros[] = "Senha e confirmação diferentes!";
                return false;
            }
            else{
                
                $this->objUsuario->senha = hash( 'sha512', $senha);
                return true;
            }
        }
    }
    
    //metodo que retorna o array com todosos inputs com erro
    public function getCampos(){
        
        return $this->campos;
    }
    
    //metodo que retorna o array com o erro de cada campo se houver
    public function getErros(){
        
        return $this->erros;
    }
    
    /*
     * Executa a verificação do cadastro
     */
    public function cadUsuario(){
      
       return $this->DaoUsuario->INSERT( $this->objUsuario );
    }
    
    private function verificar(){
        
        //o valor padrão do campo é false, para que caso não ocorra erro ele não executa a instrução
        if($this->getErros()){

            //recebe um array com os campos e se foi ou nao preenchido corretamente (true ou false)
            foreach ($this->getCampos() as $campo => $status){

                //se o campo não foi preenchido corretamente(retorno false) printa qual(is) campo(s) foram, em forma de string
                if(!$status){

                    print $campo . ",";
                }
            }

            // printa um pipe, que no ajax sera o delimitador para separar os campos do erro ocorrido.
            print "|";

            //ira printar a menssagem de erro que ocorreu naquele campo
            foreach ($this->getErros() as $num => $erro){

                //printa o tipo do erro que ocorreu no campo
                print $erro . ",";
            }
        }
        else{

            //caso não houer nenhum erro a função de cadastrar o usuario é chamada realizando o insert
            print $this->cadUsuario();
        }
    }
}