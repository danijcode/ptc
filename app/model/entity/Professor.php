<?php

/**
 * @Table = professor
 */
class Professor {

    /**
     * @Serial
     * @Colmap = ide_professor
     */
    private $id;

    /**
     * @Colmap = nome
     * @Persistence (type=texto,NotNull=true)
     */
    private $nome;

    /**
     * @Colmap = sexo
     * @Persistence (type=texto,NotNull=true,size=1)
     */
    private $sexo;

    /**
     * @Colmap = telefone
     * @Persistence (type=telefone,NotNull=true,size=10)
     */
    private $telefone;

    /**
     * @Colmap = endereco
     * @Persistence (type=texto,NotNull=true,MaxSize=120)
     */
    private $endereco;

    /**
     * @Colmap = email
     * @Persistence (type=email,NotNull=true,MaxSize=120)
     */
    private $email;

    /**
     * @Colmap = senha
     * @Persistence (type=senha,NotNull=true,size=32)
     */
    private $senha;

    /**
     * @Colmap = status
     */
    private $status;
    
    /**
     * @Relationship (objeto=Aluno,type=OneToMany)
     */
    private $alunos;

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

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function setAlunos($alunos) {
        $this->alunos = $alunos;
    }

}

?>
