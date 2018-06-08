 <?php

/**
 * Classe abstrata de conexão com banco.
 * Constrói conexão 
 * Implementa PDO;
 * 
 * @author: Gabriel Rodrigues Ruas
 * @email: blue.gr2@gmail.com
 */

abstract class AbstractDAO extends PDO{

    
     /*
     * @overload Construtor sobrecarregado c/ informações do nosso banco
     * $file arquivo c/ configurações de acesso ao banco
     */
    public function __construct( $file = 'roomie_config.ini' )
    {
        
        #Arquivo de configurações ~parseado~
        $settings = parse_ini_file( $file, TRUE );
        
        #DNS da conexão
        $dsn  = $settings['db_access']['driver'] . ':host='; #driver
        $dsn .= $settings['db_access']['host']   . ';port='; #host
        $dsn .= ( isset( $settings['db_access']['port'] ) )? $settings['db_access']['port'] . ';'  : ';'; #porta (tendo ou não)
        $dsn .= 'dbname=' . $settings['db_access']['schema']; #banco

        #Username
        $uname = $settings['db_access']['username'];
        #Senha
        $psswd = ( isset( $settings['db_access']['password'] ) ) ? $settings['db_access']['password'] : '';
        
     
        #Tentativa de conexão
        try
        {
            parent::__construct($dsn, $uname, $psswd);
            parent::setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e)
        {
            echo 'Falha na conexão: ' . $e->getMessage();
        }
        
    }
    
    public function builder( $array, $obj )
    {
        
        $objs;
        
        if ( array_key_exists( 0, $array ) )
        {
            foreach( $array as $key => $value )
            {
                if ( is_array( $value ) )
                {

                    $new = clone $obj;

                    foreach( $value as $att => $val )
                    {
                        $new->$att = $val;
                    }
                    $objs[] = $new;
                }
                else
                {
                    $obj->$key = $value;

                    if ( $value === end ( $array ) )
                    {
                        $objs[] = $obj;
                    }
                }
            }
            return $objs;
        }
        else
        {
            return false;
        }
    }
    
    public function slicer( $array ) {
        
        $objs;
                
        foreach($array as $key => $value ) {
            
            $value['imagens'] = explode('&', $value['imagens']);                       
            if( $value['comodidades'] ){
                $value['comodidades'] = explode('&', $value['comodidades']);
            }
            
            if( is_array( $value['comodidades'] ) ){
                
                foreach ($value['comodidades'] as $comodidade => $val) {

                    $comodidades[] = explode("=", $val);
                }

                foreach ($comodidades as $comodidade => $val) {

                    if($val[0] == 'maqLavar'){
                        $val[0] = 'maquina de lavar';
                    }

                    if( $val != end($comodidades) ){

                        $comos[$val[0]] = $val[1];
                    }
                }
                
                $value['comodidades'] = $comos;
            }
            
            $arr_qt[0] = array_slice( $value, 0, 18 );
            $qt = new Quartos();
            $obQto = $this->builder( $arr_qt, $qt )[0];
            
            $arr_end[0] = array_slice( $value, 18, 7 );
            $end = new Enderecos();
            $obEnd = $this->builder( $arr_end, $end )[0];
            
            $arr_img[0] = array_slice( $value, 25, 3 );
            $img = new Imagens();
            $obImg = $this->builder( $arr_img, $img )[0];
            
            $arr_usr[0] = array_slice( $value, 28, 6 );
            $usr = new Usuarios();
            $obUsr = $this->builder( $arr_usr, $usr )[0];
            
            $objs[$key] = array($obQto, $obEnd, $obImg, $obUsr);
        }
        
        return $objs;
    }
}