<?php

/**
 * @Table = atividade
 */
class Atividade {

    /**
     * @Serial
     * @Colmap = ide_atividade
     */
    private $id;

    /**
     * @Colmap = ide_treino
     */
    private $treino;

    /**
     * @Colmap = exercicio
     */
    private $exercicio;

    /**
     * @Colmap = serie
     */
    private $serie;

    /**
     * @Colmap = repeticoes
     */
    private $repeticoes;

    /**
     * @Colmap = carga
     */
    private $carga;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTreino() {
        return $this->treino;
    }

    public function setTreino($treino) {
        $this->treino = $treino;
    }

    public function getExercicio() {
        return $this->exercicio;
    }

    public function setExercicio($exercicio) {
        $this->exercicio = $exercicio;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function getRepeticoes() {
        return $this->repeticoes;
    }

    public function setRepeticoes($repeticoes) {
        $this->repeticoes = $repeticoes;
    }

    public function getCarga() {
        return $this->carga;
    }

    public function setCarga($carga) {
        $this->carga = $carga;
    }


}

?>
