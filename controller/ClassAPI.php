<?php

class API {
    
    public $vagas;

    public function __construct() {
        
        $this->vagas      = new DAOQuartos;
        $this->vagasModel = new Quartos;
    }
    
    public function vagas(){
        
        $select = false;
        
        if( ! isset( $_GET['access_token'] ) ){
            print json_encode( $vagas = new Error(1) );
            exit;
        }
        else if(  $_GET['access_token'] != $_COOKIE['R']['access_token']  ){
            print json_encode( $vagas = new Error(1) );
            exit;
        }
        unset($_GET['access_token']);
        unset($_GET['c']);
        
        foreach( $this->vagasModel as $vmcampo => $vmvalor){
            
            foreach ( $_GET as $gcampo => $gvalor ){
            
                if ( $vmcampo == $gcampo ){
                    
                    $select[$gcampo] = $gvalor;
                }
            }
        }
        
        if($select){
            $this->vagas = $this->vagas->SELECT( $select );
        }
        else{
            $this->vagas = new Error(2);
        }

        print json_encode( $this->vagas );
    }
    
    public function login(){
        
        $token = new Token(hash( 'sha512', 'roomie' . rand(0, 100)));
        
        $time = time() + (2 * 24 * 60 * 60);
        setcookie("R[access_token]",  $token->token, $time, "/");
        
        print json_encode( $token );
    }
}
