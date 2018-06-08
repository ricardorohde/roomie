<?php
class UploadImages extends Controller{
    
    private $imagens;
    
    private $upload;

    private $caminhos  = array();
    
    //Adiciona as imagens dentro da pasta
    public function addImages( $files ) {
        
        if( isset( $files['imagens'] ) ){
            
            //caminho aonde sera salvo a imagem "C:/.../hash(idUsuario)"
            $hash_idUsuario = hash('crc32', $_SESSION['USUARIO'][0]->idUsuario)."/";
            $this->upload = UPLOADS . $hash_idUsuario;

            //monta o array de imagens
            $this->imagens = $this->estruturar_array($files);
            unset( $files );

            //troca o nome da imagem
            foreach ($this->imagens as $imagem => $dados){

                $time =  time( date( 'z y h n s' ) );

                $this->imagens[$imagem]['name'] = hash('md2', $this->imagens[$imagem]['name'] . $time) . $this->extensao($this->imagens[$imagem]['type']);

                if ( $this->save($imagem) ){

                    $this->caminhos[] = RAIZ . "uploads/" . $hash_idUsuario . $this->imagens[$imagem]['name'];
                }
            }
        }
        
        return $this->caminhos;
    }
    
    //função para salvar cada imagem em seu deretorio
    private function save($imagem){
        
        //confere se a pasta do usuario ja existe;
        if ( ! is_dir( $this->upload ) ){
            
            mkdir($this->upload, 777);
        }
        
        //salva a imagem e retorna se foi salvo
        return move_uploaded_file($this->imagens[$imagem]["tmp_name"], $this->upload . $this->imagens[$imagem]['name']);
    }
    
    //pega a extenção da imagem enviada
    private function extensao( $extensao ){
        
        $_extensao = substr($extensao, 6);
        
        return "." . $_extensao;
    }
    
    private function estruturar_array($files){
        
        $new_files  = array();
        $file_count = count( $files['imagens']['name'] );
        $file_keys  = array_keys( $files['imagens'] );
        
        for ( $i = 0; $i < $file_count; $i++ ) {
            
            foreach ($file_keys as $key) {
                
                $new_files[$i][$key] = $files['imagens'][$key][$i];
            }
        }
        
        return $new_files;
    }
}