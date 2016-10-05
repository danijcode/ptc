<?php

/**
 * @Table = avaliacao
 */
class Avaliacao {

     /**
     * @Serial
     * @Colmap = ide_avaliacao
     */
    private $id;
    
     /**
     * @Colmap = ide_aluno
     * @Relationship (objeto=Aluno,type=OneToOne)
     */
    private $aluno;
    
     /**
     * @Colmap = peso
     */
    private $peso;
    
     /**
     * @Colmap = altura
     */
    private $altura;
    
     /**
     * @Colmap = peitoral
     */
    private $peitoral;
    
     /**
     * @Colmap = cintura
     */
    private $cintura;
    
     /**
     * @Colmap = abdomen
     */
    private $abdomen;
    
     /**
     * @Colmap = quadril
     */
    private $quadril;
    
     /**
     * @Colmap = data
     * @Mask = data
     * @Persistence (type=data,NotNull=true,size=8)
     */
    private $data;

        
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

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getPeitoral() {
        return $this->peitoral;
    }

    public function setPeitoral($peitoral) {
        $this->peitoral = $peitoral;
    }

    public function getCintura() {
        return $this->cintura;
    }

    public function setCintura($cintura) {
        $this->cintura = $cintura;
    }

    public function getAbdomen() {
        return $this->abdomen;
    }

    public function setAbdomen($abdomen) {
        $this->abdomen = $abdomen;
    }

    public function getQuadril() {
        return $this->quadril;
    }

    public function setQuadril($quadril) {
        $this->quadril = $quadril;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }


}

?>
