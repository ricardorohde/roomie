<?php
    
    class DAOQuartos extends AbstractDAO {
    
        public function INSERT( $dados ) {
            
            #Tirando do array pra trabalhar melhor
            $usuario  = $dados[0];
            $quarto   = $dados[1]; 
            $endereco = $dados[2];
            $imagens  = $dados[3];
            
            #Complementando quarto com id do dono
            $quarto->tUsuario_idUsuarios = $usuario->idUsuario;
            
            #Hora de inserir o endereço e imagem
            $end   = new DAOEnderecos();
            $idEnd = $end->INSERT($endereco);
            $img   = new DAOImagens();
            $idImg = $img->INSERT($imagens);
            
            #Se deu pra inserir Endereço e Imagens, adiciona ID de ambos
            $quarto->tEndereco_idEnderecos = ( isset( $idEnd ) ) ? $idEnd : null;
            $quarto->tImagens_idImagens    = ( isset( $idImg ) ) ? $idImg : null;
            
            #Hora de inserir o quarto
            $sql = "INSERT INTO tquartos(tipoPropriedade,"
                 . "                     tipoQuarto,"
                 . "                     numeroDeVagas,"
                 . "                     valorAluguel,"
                 . "                     descAluguel,"
                 . "                     valorDespesas,"
                 . "                     descDespesas,"
                 . "                     dataUltimaAtualizacao,"
                 . "                     comodidades,"
                 . "                     ativo,"
                 . "                     genero,"
                 . "                     sobreQuarto,"
                 . "                     mobiliaQuarto,"
                 . "                     regrasRotinas,"
                 . "                     tUsuarios_idUsuario,"
                 . "                     tImagens_idImagens,"
                 . "                     tEnderecos_idEndereco)"
                 . "               VALUES(:tipoPropriedade,"
                 . "                      :tipoQuarto,"
                 . "                      :numeroDeVagas,"
                 . "                      :valorAluguel,"
                 . "                      :descAluguel,"
                 . "                      :valorDespesas,"
                 . "                      :descDespesas,"
                 . "                      :dataUltimaAtualizacao,"
                 . "                      :comodidades,"
                 . "                      :ativo,"
                 . "                      :genero,"
                 . "                      :sobreQuarto,"
                 . "                      :mobiliaQuarto,"
                 . "                      :regrasRotinas,"
                 . "                      :tUsuarios_idUsuario,"
                 . "                      :tImagens_idImagens,"
                 . "                      :tEnderecos_idEndereco)";
            
            try {
                $query = $this->prepare($sql);
                $query->execute( array(':tipoPropriedade'        => $quarto->tipoPropriedade,
                                       ':tipoQuarto'             => $quarto->tipoQuarto,
                                       ':numeroDeVagas'          => $quarto->numeroDeVagas,
                                       ':valorAluguel'           => $quarto->valorAluguel,
                                       ':descAluguel'            => $quarto->descAluguel,
                                       ':valorDespesas'          => $quarto->valorDespesas,
                                       ':descDespesas'           => $quarto->descDespesas,
                                       ':dataUltimaAtualizacao'  => $quarto->dataUltimaAtualizacao,
                                       ':comodidades'            => $quarto->comodidades,
                                       ':ativo'                  => $quarto->ativo,
                                       ':genero'                 => $quarto->genero,
                                       ':sobreQuarto'            => $quarto->sobreQuarto,
                                       ':mobiliaQuarto'          => $quarto->mobiliaQuarto,
                                       ':regrasRotinas'          => $quarto->regrasRotinas,
                                       ':tUsuarios_idUsuario'    => $quarto->tUsuario_idUsuarios,
                                       ':tImagens_idImagens'     => $quarto->tImagens_idImagens,
                                       ':tEnderecos_idEndereco'  => $quarto->tEndereco_idEnderecos));
                $result = $this->lastInsertId();
            } catch (Exception $ex) {
                #TODO: destruir endereços e imagens (se deu errado insert do quarto)
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function SELECT ( $atts ) {
            
            $sql = "    SELECT q.*,"
                 . "           e.*,"
                 . "           i.*,"
                 . "           u.*"
                 . "      FROM tquartos AS q "
                 . "INNER JOIN (tenderecos AS e, "
                 . "            timagens   AS i, "
                 . "            tusuarios  AS u) "
                 . "        ON (q.tUsuarios_idUsuario   = u.idUsuario AND"
                 . "            q.tImagens_idImagens    = i.idImagens AND"
                 . "            q.tEnderecos_idEndereco = e.idEndereco) "
                 . " WHERE ";
            
            $params = array();
            
            if ( array_key_exists( 'limit', $atts ) ) {
                $sql .= "1 = 1 LIMIT :limit";
                $params[':limit'] = $atts['limit'];
            }
            else {
                foreach( $atts as $param => $value ) {
                
                    $params[':' . $param] = $value;
                
                    if ( $value === end( $atts ) ) {
                        if ($param == 'tipoQuarto' || $param == 'genero' || $param == 'idQuarto') {
                            $sql .= $param . " = :" . $param;
                        }
                        else {
                            $sql .= $param . " <= :" . $param;
                        }
                    }
                    else {
                        if ($param == 'tipoQuarto' || $param == 'genero' || $param == 'idQuarto') {
                            $sql .= $param . " = :" . $param . "\n AND ";
                        }
                        else {
                            $sql .= $param . " <= :" . $param . "\n AND ";
                        }
                    }
                }
            }
            
            try {
                $query = $this->prepare($sql);
                if ( array_key_exists( 'limit', $atts ) ) {
                    $query->bindValue(':limit', $atts['limit'], PDO::PARAM_INT);
                    $query->execute();
                }
                else {
                    $query->execute($params);
                }
                $return = $query->fetchAll(PDO::FETCH_ASSOC);
                $result = $this->slicer($return);
            } catch (Exception $ex) {
                $ex->getMessage();  
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
        public function UPDATE( Quartos $qt ) {
            
            $sql = "UPDATE tQuartos "
                 . "   SET tipoPropriedade       = :tipoPropriedade,"
                 . "   SET tipoQuarto            = :tipoQuarto,"
                 . "   SET numeroDeVagas         = :numeroDeVagas,"
                 . "   SET valorAluguel          = :valorAluguel,"
                 . "   SET genero                = :genero,"
                 . "   SET descrAluguel          = :descrAluguel"
                 . "   SET valorDespesas         = :valorDespesas,"
                 . "   SET descrDespesas         = :descrDespesas,"
                 . "   SET dataUltimaAtualizacao = :dataUltimaAtualizacao,"
                 . "   SET comodidades           = :comodidades,"
                 . "   SET ativo                 = :ativo,"
                 . "   SET sobreQuarto'          = :sobreQuarto,"
                 . "   SET mobiliaQuarto'        = :mobiliaQuarto,"
                 . "   SET regrasRotinas'        = :regrasRotinas";
            
            try {
                $query = $this->prepare($sql);
                $result = $query->execute(array(':tipoPropriedade'       => $qt->tipoPropriedade,
                                                ':tipoQuarto'            => $qt->tipoQuarto,
                                                ':numeroDeVagas'         => $qt->numeroDeVagas,
                                                ':valorAluguel'          => $qt->valorAluguel,
                                                ':genero'                => $qt->genero,
                                                ':descrAluguel'          => $qt->descrAluguel,
                                                ':valorDespesas'         => $qt->valorDespesas,
                                                ':descrDespesas'         => $qt->descrDespesas,
                                                ':dataUltimaAtualizacao' => $qt->dataUltimaAtualizacao,
                                                ':comodidades'           => $qt->comodidades,
                                                ':ativo'                 => $qt->ativo,
                                                ':sobreQuarto'           => $qt->sobreQuarto,
                                                ':mobiliaQuarto'         => $qt->mobiliaQuarto,
                                                ':regrasRotinas'         => $qt->regrasRotinas));
            } catch (Exception $ex) {
                $result = false;
            }
            finally {
                return $result;
            }
        }
        
    }

 ?>
