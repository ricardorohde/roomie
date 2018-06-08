<?php
class LoginUsuario extends Controller{
    
    private $objUsuario;
    private $post;
    
    public function __construct( $post ) {
        
        $this->post = $post;
        
        if( !isset($_SESSION['USUARIO']) ){
        
            $this->objUsuario = new DAOUsuarios();
            $this->objUsuario = $this->objUsuario->SELECT( array('email'=>$post['email'], 'senha' => hash( 'sha512', $post['senha'])) );

            if( $this->objUsuario ){
                $this->logar();
            }
            else{
                print 0;
            }
        }
        else{
            
            $this->deslogar();
        }
    }
    
    private function logar(){
        
        /*
         * Cria o Obj usuario
         */
        $_SESSION['USUARIO'] = $this->objUsuario;
        
        /*
         * Caso escolhido, salva no cookie o login
         */
        if( $this->post['manterConectado'] ){
            
            $cookie = array(
                'e' => $this->post['email'],
                's' => hash( 'sha512', $this->post['senha']),
                't' => 30
            );
            
            Cookie::salvar_login_cookie($cookie);
        }
        
        print 1;
    }
    
    private function deslogar(){

        session_destroy();
        
        Cookie::apagar_login_cookie();
        
        print 1;
    }
}

