<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @package HELPERS
 */

class SecurityHelper {

    private $usuario;
    private static $instancia = null;
    private $seguranca;

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new SecurityHelper();
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('Clone n�o � permitido.', E_USER_ERROR);
    }

    public function SecurityHelper() {
        if (!isset($_SESSION))
            session_start();

        $this->seguranca = $this->getDadosSeguranca();

        if ($this->isLogon()) {
            $this->usuario = unserialize($_SESSION[$this->seguranca['sessao']]);           
        } else {
            $flag = (stripos($_SERVER['QUERY_STRING'], "Security/") === 0) ? true : false;
            if (!$flag) {
                $objRedirectorHelper = new RedirectorHelper();
                $objRedirectorHelper->goToControllerAction('Security','logon');
            }
        }
        
        //Verificar Acesso ao Controller Especifico
        
    }

    public function iniciarSessao(Professor &$objUsuario) {
        $_SESSION[$this->seguranca['sessao']] = serialize($objUsuario);
    }

    public function destruirSessao() {
        //session_unregister($this->seguranca['sessao']);
        unset($_SESSION[$this->seguranca['sessao']]);
        $this->seguranca['sessao'] = null;
    }

    private function getDadosSeguranca() {
        $ini = parse_ini_file('system/config/config.ini', true);
        return $ini['seguranca'];
    }

    public function getUsuario() {
        return $this->usuario;
    }

    private function isLogon() {
        if (isset($_SESSION[$this->seguranca['sessao']]))
            return true;

        return false;
    }
    
    
    /**
     * Fun��o para gerar senhas aleat�rias
     * @param integer $tamanho Tamanho da senha a ser gerada
     * @param boolean $maiusculas Se ter� letras mai�sculas
     * @param boolean $numeros Se ter� n�meros
     *
     * @return string A senha gerada
     */
    public static function gerarSenhaRandomica($tamanho = 8, $maiusculas = true, $numeros = true) {

        $min = 'abcdefghijklmnopqrstuvwxyz';
        $mai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';

        $return = '';
        $caracteres = '';

        $caracteres .= $min;

        if ($maiusculas)
            $caracteres .= $mai;
        if ($numeros)
            $caracteres .= $num;


        $len = strlen($caracteres);

        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $return .= $caracteres[$rand - 1];
        }

        return $return;
    }    

}

?>
