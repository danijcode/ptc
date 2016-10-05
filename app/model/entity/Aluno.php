<?php

/**
 * @Table = aluno
 */
class Aluno {

    /**
     * @Serial
     * @Colmap = ide_aluno
     */
    private $id;

    /**
     * @Colmap = ide_professor
     * @Relationship (objeto=Professor,type=OneToOne)
     */
    private $idProfessorResponsavel;

    /**
     * @Colmap = matricula
     */
    private $matricula;

    /**
     * @Colmap = academia
     * @Persistence (type=texto,NotNull=true,MaxSize=80)
     */
    private $academia;

    /**
     * @Colmap = data_nascimento
     * @Mask = data
     * @Persistence (type=data,NotNull=true,size=8)
     */
    private $dataNascimento;

    /**
     * @Colmap = nome
     * @Persistence (type=texto,NotNull=true,MaxSize=80)
     */
    private $nome;

    /**
     * @Colmap = sexo
     * @Persistence (type=texto,NotNull=true,Size=1)
     */
    private $sexo;

    /**
     * @Colmap = telefone
     * @Persistence (type=telefone)
     */
    private $telefone;

    /**
     * @Colmap = endereco
     * @Persistence (type=texto,NotNull=true,MaxSize=120)
     */
    private $endereco;

    /**
     * @Colmap = email
     * @Persistence (type=texto,NotNull=true,MaxSize=80)
     */
    private $email;

    /**
     * @Colmap = token
     */
    private $token;

    /**
     * @Colmap = status
     * @Persistence (type=texto,Size=1)
     */
    private $status;

    /**
     * @Relationship (objeto=Treino,type=OneToMany)
     */
    private $treino;

    /**
     * @Relationship (objeto=Avaliacao,type=OneToMany)
     */
    private $avaliacao;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdProfessorResponsavel() {
        return $this->idProfessorResponsavel;
    }

    public function setIdProfessorResponsavel($idProfessorResponsavel) {
        $this->idProfessorResponsavel = $idProfessorResponsavel;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getAcademia() {
        return $this->academia;
    }

    public function setAcademia($academia) {
        $this->academia = $academia;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    public function getTreino() {
        return $this->treino;
    }

    public function setTreino($treino) {
        $this->treino = $treino;
    }
    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

}

?>
