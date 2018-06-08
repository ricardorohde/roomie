<!DOCTYPE html>
<html lang="pt-BR">
    
    <head>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Home Roomie">
        <meta name="author" content="Roomie">
        
        <title>
            <?=get_title()?>
        </title>
              
        <?php 
            
            /*
             * Parametro getHeader herdado da metodo getHeader()
             */
            $this->getCss( $getHeader ); 
        ?>
    </head>
    
    <body>        
    <?php include 'view/paginas/headers/header-' . $getHeader['local'] . '.php';
                
