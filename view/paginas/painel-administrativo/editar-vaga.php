<?php
$getHeader = array(
    'local' => 'painel-administrativo'
);

$this->getHeader( $getHeader );

var_dump($this->minhasVagas);

$getFooter = array(
    'local'      => 'painel-administrativo',
    'components' => array(),
    'js'       => array(
        'ajax-logoff-usuario',
    )
);

$this->getFooter( $getFooter );