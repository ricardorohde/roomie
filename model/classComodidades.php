<?php
class Comodidades extends Model{
    
    public $idComodidades = "";
    public $televisao     = "";
    public $internet      = "";
    public $maqLavar      = "";
    public $itensCozinha  = "";
    public $limpeza       = "";
    public $mobilia       = "";
    public $descrMobilia  = "";
    public $observacoes   = "";
    
    public function insertComodidades() {
        
        //coloca aspas simples em todos os campos que não sejam com valor "NULL"
        foreach ( $this as $attr => $valor){
            
            if( $valor != "null" && $valor != "true" && $valor != "false"){
                
                $this->$attr = " '{$valor}' ";
            }
        }
        
        //insere a comodidade
        $sql = "INSERT INTO tcomodidades(tv,
                                         internet, 
                                         maquinaDeLavar,
                                         itensCozinha, 
                                         limpeza, 
                                         moveisQuarto, 
                                         descrMoveisQuarto, 
                                         observacoes) 
                                VALUES ({$this->televisao},
                                        {$this->internet},
                                        {$this->maqLavar},
                                        {$this->itensCozinha},
                                        {$this->limpeza},
                                        {$this->mobilia},
                                        {$this->descrMobilia},
                                        {$this->observacoes})";
        
        parent::query($sql);
        
        //pega o id da comodidade que acabou de ser inserida
        parent::query("SELECT MAX(idComodidades)"
                    . "FROM tcomodidades");
        
        //retorna a id inserida
        return parent::toArray()[0][0];
    }
}