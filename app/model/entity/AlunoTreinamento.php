<?php

/**
 * @Table = aluno_treinamento
 */
class AlunoTreinamento {
   
     /**
     * @Serial
     * @Colmap = ide_aluno_treinamento
     */
    private $id;

    /**
     * @Colmap = aluno
     */
    private $aluno;
    
    /**
     * @Colmap = data_treino
     */
    private $dataTreino;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAluno() {
        return $this->aluno;
    }

    public function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    public function getDataTreino() {
        return $this->dataTreino;
    }

    public function setDataTreino($dataTreino) {
        $this->dataTreino = $dataTreino;
    }

}


?>
