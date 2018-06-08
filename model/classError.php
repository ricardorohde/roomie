<?php

class Error{
    
    public function __construct( $erro ) {
        
        if( $erro == 1 ){
            $this->error = 'not_authorized';
            $this->errorDescription = 'Access token is unknown or expired';
        }
        else if(  $erro == 2 ){
            $this->error = 'invalid_field';
            $this->errorDescription = 'field does not exist or is misspelled';
        }
    }
    
    public $error;
    public $errorDescription;
}
