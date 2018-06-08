<?php
    
class DAOUsuarios extends AbstractDAO
{
    public function SELECT( $atts )
    {

        $sql = "SELECT * "
              .  "FROM tusuarios "
              . "WHERE ";

        $params = array();

        foreach( $atts as $param => $value )
        {
            $params[':' . $param] = $value;

            if ( $value === end( $atts ) )
            {
                $sql .= $param . " = :" . $param;
            }
            else
            {
                $sql .= $param . " = :" . $param . "\n AND ";
            }
        }

        try
        {
            $query = $this->prepare( $sql );
            $query->execute($params);
            $return = $query->fetchAll(PDO::FETCH_ASSOC);
            $user = new Usuarios();
            $result = $this->builder($return, $user);
        }
        catch( PDOException $e )
        {
            $result = false;
        }
        finally
        {
            return $result;
        }
    }

    public function INSERT( Usuarios $usr )
    {

        $sql = "INSERT INTO tusuarios(dataNascimento,"
                . "                   nome,"
                . "                   email,"
                . "                   telefones,"
                . "                   senha)"
                . "  VALUES           (:dataNascimento,"
                . "                    :nome,"
                . "                    :email,"
                . "                    :telefones,"
                . "                    :senha)";
        try
        {
            $query = $this->prepare($sql);
            $query->execute(array(':dataNascimento' => $usr->dataNascimento,
                                  ':nome'           => $usr->nome,
                                  ':email'          => $usr->email,
                                  ':telefones'      => $usr->telefones,
                                  ':senha'          => $usr->senha));
            $result = $this->lastInsertId();
        } 
        catch (Exception $e) 
        {
            echo 'Erro: ' . $e->getMessage();
            $result = false;
        }
        finally
        {
            return $result;
        }

    }

    public function DELETE( Usuarios $usr )
    {

        $sql = "DELETE FROM tusuarios 
                      WHERE idUsuario = :idUsuario";

        try
        {
            $query = $this->prepare( $sql );
            $query->bindValue( ":idUsuario", $usr->idUsuario );
            $result = $query->execute();
        }
        catch (Exception $e)
        {
            echo 'Erro: ' . $e->getMessage();
            $result = false;
        }
        finally
        {
            return $result;
        }

    }

    public function UPDATE( Usuarios $usr )
    {

    }

}
