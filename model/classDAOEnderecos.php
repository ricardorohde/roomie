<?php

    class DAOEnderecos extends AbstractDAO {
    
        public function INSERT( Enderecos $end ) {
            
            $sql = "INSERT INTO tenderecos(rua,"
                 . "                       bairro,"
                 . "                       cidade,"
                 . "                       estado,"
                 . "                       cep,"
                 . "                       complemento) "
                 . "     VALUES            (:rua,"
                 . "                        :bairro,"
                 . "                        :cidade,"
                 . "                        :estado,"
                 . "                        :cep,"
                 . "                        :complemento)";
            
            try {
                $query = $this->prepare( $sql );
                $query->execute(array(':rua'         => $end->rua,
                                      ':bairro'      => $end->bairro,
                                      ':cidade'      => $end->cidade,
                                      ':estado'      => $end->estado,
                                      ':cep'         => $end->cep,
                                      ':complemento' => $end->complemento));
                $result = $this->lastInsertId();
            } catch (Exception $ex) {
                $result = false;
                #echo $ex->getMessage();
            }
            finally {
                return $result;
            }
        }
        
        public function SELECT( $att ) {
            
            $sql = "SELECT * "
                 . "  FROM tenderecos"
                 . " WHERE idEndereco = :idEndereco";
            
            try {
                $query = $this->prepare( $sql );
                $query->bindValue(':idEndereco', $att);
                $query->execute();
                $return = $query->fetchAll( PDO::FETCH_ASSOC );
                $end = new Enderecos();
                $result = $this->builder( $return, $end );
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function DELETE( $att ) {
            
            $sql = "DELETE FROM tenderecos "
                 . "      WHERE idEndereco = :idEndereco";
            
            try {
                $query = $this->prepare( $sql );
                $query->bindValue( ':idEndereco', $att );
                $result = $query->execute();
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function UPDATE( Enderecos $end ) {
            
            $sql = "UPDATE tenderecos "
                 . "   SET rua         = :rua,"
                 . "       bairro      = :bairro,"
                 . "       cidade      = :cidade,"
                 . "       estado      = :estado,"
                 . "       cep         = :cep,"
                 . "       complemento = :complemento"
                 . " WHERE idEndereco  = :idEndereco";
            
            try {
                $query = $this->prepare( $sql );
                $result = $query->execute(array(':rua'         => $end->rua,
                                                ':bairro'      => $end->bairro,
                                                ':cidade'      => $end->cidade,
                                                ':estado'      => $end->estado,
                                                ':cep'         => $end->cep,
                                                ':complemento' => $end->complemento,
                                                ':idEndereco' => $end->idEndereco));
            } catch (Exception $ex) {
                $result = false;
                echo $ex->getMessage();
            }
            finally {
                return $result;
            }
        }       
}
