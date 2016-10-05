<?php

/**
 * @Table = grupo_muscular
 */
class GrupoMuscular {
   
     /**
     * @Serial
     * @Colmap = ide_grupo_muscular
     */
    private $id;

    /**
     * @Colmap = nome
     */
    private $nome;
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}


?>
