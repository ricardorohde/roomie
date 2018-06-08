<?php
abstract class Model
{
    
    public function __get( $att ) { return $this->$att; }
    
    public function __set( $att, $val ) { $this->$att = $val; }
}
