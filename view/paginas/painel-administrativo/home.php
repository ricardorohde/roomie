<?php
$getHeader = array(
    'local'      => 'painel-administrativo',
    'components' => array(),
);

$this->getHeader( $getHeader );
?>


NOTIFICAÇÕES  
                
        
<?php 
$getFooter = array(
    'local'      => 'painel-administrativo',
    'components' => array(),
    'js'       => array(
        'ajax-logoff-usuario',
    )
);

$this->getFooter( $getFooter );