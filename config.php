<?php
/*
 * CAMINHO PASTA LOCAL
 */
define('RAIZ',  '/Roomie/');

/*
 * Titulo site
 */
define('TITLE', 'Roomie');

/*
 * caminho uploads
 */
define('UPLOADS', 'C:/wamp/www/Roomie/uploads/');

/*
 * Variavel global resposavel por armazenar a url da pagina (metodo e parametros)    
 */
global $url;

/*
 * Configuração para chamar pagina incial
 */
$controller_ = 'home';
$method      = 'index';
$parans      = null;