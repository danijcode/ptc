<?php

/**
 * @Table = exercicio
 */
class Exercicio {
   
     /**
     * @Serial
     * @Colmap = ide_exercicio
     */
    private $id;

    /**
     * @Colmap = nome
     */
    private $nome;
    
    /**
     * @Colmap = grupo_muscular
     * @Relationship (objeto=GrupoMuscular,type=OneToOne)
     */
    private $grupoMuscular;
    
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

    public function getGrupoMuscular() {
        return $this->grupoMuscular;
    }

    public function setGrupoMuscular($grupoMuscular) {
        $this->grupoMuscular = $grupoMuscular;
    }

}


?>
