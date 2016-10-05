<?php

/**
 * Description of MySqlDBO
 *
 * @author igor
 */
abstract class PdoFactoryORM extends AbstractFactoryORM {

    public $conn = null;

    public function __construct() {
        $dados = $this->getDadosConexao();
        parent::__construct($dados);
        $this->factory = "Pdo";
    }

    public function connectDB() {

        try {

            $this->conn = new PDO("{$this->type}:host={$this->server};dbname={$this->database};", //servidor e Banco de Dados 
                            "{$this->user}", //usuario
                            "{$this->password}", // Senha
                            array(
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1", //Força UTF8
                                PDO::ATTR_PERSISTENT => true // Persistir a conexao
                            )
            );

            return $this->conn;
        } catch (Exception $e) {
            LogErroORM::gerarLog("CONEXAO - NÃO FOI POSSIVEL ESTABELECER UMA CONEXÃO COM O SERVIDOR", $e->getMessage());
            $redirecionamento = new RedirectorHelper();
            $redirecionamento->goToControllerAction("Errors", "database");
        }
    }

}

?>
