<?php

/**
 * @Table = treino
 */
class Treino {

    /**
     * @Serial
     * @Colmap = ide_treino
     */
    private $id;

    /**
     * @Colmap = nome
     */
    private $nome;

    /**
     * @Colmap = ide_aluno
     * @Relationship (objeto=Aluno,type=OneToOne)
     */
    private $idAluno;

    /**
     * @Mask = data
     * @Colmap = data_treino
     * @Persistence (type=data,NotNull=true,size=8)
     */
    private $dataTreino;

    /**
     * @Colmap = objetivo
     */
    private $objetivo;

    /**
     * @Colmap = observacao
     */
    private $observacao;

    /**
     * @Colmap = sessoes
     */
    private $sessoes;

    /**
     * @Colmap = sessoes_feitas
     */
    private $sessoesFeitas;

    /**
     * @Colmap = data_atualizacao
     */
    private $dataAtualizacao;

    /**
     * @Colmap = status
     */
    private $status;
    
    /**
     * @Relationship (objeto=Atividade,type=OneToMany)
     */
    private $atividades;
    
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
    public function getIdAluno() {
        return $this->idAluno;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    
    public function getDataTreino() {
        return $this->dataTreino;
    }

    public function setDataTreino($dataTreino) {
        $this->dataTreino = $dataTreino;
    }

    public function getObjetivo() {
        return $this->objetivo;
    }

    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getSessoes() {
        return $this->sessoes;
    }

    public function setSessoes($sessoes) {
        $this->sessoes = $sessoes;
    }

    public function getSessoesFeitas() {
        return $this->sessoesFeitas;
    }

    public function setSessoesFeitas($sessoesFeitas) {
        $this->sessoesFeitas = $sessoesFeitas;
    }

    public function getDataAtualizacao() {
        return $this->dataAtualizacao;
    }

    public function setDataAtualizacao($dataAtualizacao) {
        $this->dataAtualizacao = $dataAtualizacao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    public function getAtividades() {
        return $this->atividades;
    }

    public function setAtividades($atividades) {
        $this->atividades = $atividades;
    }
    
}

?>
