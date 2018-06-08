<?php
    
    class DAOImagens extends AbstractDAO {
        
        public function SELECT( $id ) {
            
            $sql = "SELECT * "
                  ."  FROM timagens "
                  ." WHERE idImagens = :idImagens";
            
            try {
                $query = $this->prepare( $sql );
                $query->bindValue( ':idImagens', $id );
                $query->execute();
                $return = $query->fetchAll( PDO::FETCH_ASSOC );
                $imgs = new Imagens();
                $result = $this->builder( $return, $imgs );
            } catch (Exception $ex) {
                $result = false;                
            }
            finally {
                return $result;
            }
        }
    
        public function INSERT( Imagens $img ) {
            
            $sql = "INSERT INTO timagens(capa, imagens) "
                 . "       VALUES       (:capa,"
                 . "                     :imagens)";
            
            try {
                $query = $this->prepare($sql);
                $query->execute(array(':capa'    => $img->capa,
                                      ':imagens' => $img->imagens));
                $result = $this->lastInsertId();
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function DELETE( Imagens $img ) {
            
            $sql = "DELETE FROM timagens "
                  . "WHERE idImagens = :idImagens";
            
            try {
                $query = $this->prepare( $sql );
                $query->bindValue( ':idImagens', $img->idImagens );
                $result = $query->execute();
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function UPDATE( Imagens $img ) {
            
            $sql = "UPDATE  timagens "
                 . "   SET      capa = :capa,"
                 . "         imagens = :imagens"
                 . " WHERE idImagens = :idImagens";
            
            try {
                $query = $this->prepare( $sql );
                $result = $query->execute(array( ':capa'      => $img->capa,
                                                 ':imagens'   => $img->imagens,
                                                 ':idImagens' => $img->idImagens));
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
}
