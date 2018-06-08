<?php
$getHeader = array(
    'local' => 'painel-administrativo',
    'components' => array()
);

$this->getHeader( $getHeader );


print_r($this->idUsuario);


$getFooter = array(
    'local'      => 'painel-administrativo',
    'components' => array(),
    'js'       => array(
        'ajax-logoff-usuario',
    )
);

$this->getFooter( $getFooter );
