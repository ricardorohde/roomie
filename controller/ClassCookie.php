<?php
abstract class Cookie {
    
    /*
     * metodo para buscar dados de login no cookie
     */
    static function confere_login_cookie(){

        session_start();

        if( isset( $_COOKIE['r'] ) ){

            $objUsuario = new DAOUsuarios();        
            $objUsuario = $objUsuario->SELECT( array( 'email' => $_COOKIE['r']['e'], 'senha' => $_COOKIE['r']['s'] ) );

            if( $objUsuario ){

                $_SESSION['USUARIO'] = $objUsuario;
            }
            else{
                unset( $objUsuario );
            }
        }
    }
    
    static function salvar_login_cookie($cookie = array()){
        
        /*
         * tempo do cache na memoria
         * 
         * dia * hora * minuto * segundo
         */
        $time = time() + ($cookie['t'] * 24 * 60 * 60);
        
        setcookie("r[e]", $cookie['e'], $time, "/");
        setcookie("r[s]", $cookie['s'], $time, "/");
    }
    
    static function apagar_login_cookie(){
        
        if( isset( $_COOKIE['r'] ) ){
            
            setcookie("r[e]", "", time()-3600, "/");
            setcookie("r[s]", "", time()-3600, "/");
        }
    }
}
