<?php

/**
 * Description of FormatHelper
 * @package system
 * @subpackage helpers
 * @version 
 */
class FormatHelper {

    /**
     * @tutorial: Formata��o para numero de CPF
     * FormatHelper::formatCPF
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $cpf
     * @return string cpf_formatado ###.###.###-## 
     */
    public static function formatCPF($cpf) {

        $cpf_unformat = FormatHelper::limparString($cpf);

        if (strlen($cpf_unformat) == 11) {
            $cpf_pri = substr($cpf_unformat, 0, 3);
            $cpf_seg = substr($cpf_unformat, 3, 3);
            $cpf_ter = substr($cpf_unformat, 6, 3);
            $cpf_ver = substr($cpf_unformat, 9, 2);

            $cpfFormat = $cpf_pri . "." . $cpf_seg . "." . $cpf_ter . "-" . $cpf_ver;

            return $cpfFormat;
        } else {

            return "CPF n�o tem a quantidade de caracteres para formatar";
        }
    }

    /**
     * @tutorial: Formata�ao para Hora
     * FormatHelper::unformatHora
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $hora
     * @return string $unfor;
     */
    public static function unformatHora($hora) {

        if ((strlen($hora) == 5 ) || (strlen($hora) == 8 ))
            return $hora;


        $hora_format = $hora;

        $unfor = str_replace(":", "", $hora_format);

        return $unfor;
    }

    /**
     * @tutorial: Formata�ao para Hora
     * FormatHelper::formatHora
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $hora , $seg default false
     * @return string $hora_format;
     */
    public static function formatHora($hora, $seg=false) {

        if ((strlen($hora) == 5 ) || (strlen($hora) == 8 ))
            return $hora;

        if ($seg) {
            $_hora = substr($hora, 0, 2);
            $_min = substr($hora, 2, 2);
            $_seg = substr($hora, 4, 6);
            $hora_format = $_hora . ":" . $_min . ":" . $_seg;
        } else {
            $_hora = substr($hora, 0, 2);
            $_min = substr($hora, 2, 2);
            $hora_format = $_hora . ":" . $_min;
        }
        return $hora_format;
    }

    /**
     * @tutorial: Formata��o para numero de CPF
     * FormatHelper::unformatCPF
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $cpf
     * @return string cpf_formatado ###.###.###-## 
     */
    public static function unformatCPF($cpf) {

        $cpf_format = FormatHelper::limparString($cpf);

        if (strlen($cpf_format) == 11) {
            $cpf_format = str_replace(".", "", $cpf_format);
            $cpf_format = str_replace("-", "", $cpf_format);

            $cpf_unformat = $cpf_format;

            return $cpf_unformat;
        } else {
            return "CPF n�o tem a quantidade de caracteres para unformatar";
        }
    }

    /**
     * @tutorial: Formata��o para numero de CEP
     * FormatHelper::formatCEP
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $cep
     * @return string $cepFormat
     */
    public static function formatCEP($cep) {

        if (strlen($cep) > 8)
            return $cep;

        $cep_unformat = $cep;

        $cep_pri = substr($cep_unformat, 0, 5);
        $cep_seg = substr($cep_unformat, 5, 3);

        $cepFormat = $cep_pri . "-" . $cep_seg;

        return $cepFormat;
    }

    /**
     * @tutorial: Formata��o para numero de CEP
     * FormatHelper::unformatCEP
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $cep
     * @return string $cep_unformat
     */
    public static function unformatCEP($cep) {

        $cep_format = $cep;

        $cep_format = str_replace(".", "", $cep_format);
        $cep_format = str_replace("-", "", $cep_format);

        $cep_unformat = $cep_format;

        return $cep_unformat;
    }

    /**
     * @tutorial: Formata��o para numero de telefone
     * FormatHelper::formatTelefone
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $tel
     * @return string $tel_format
     */
    public static function formatTelefone($tel) {

        $telefone_unformat = $tel;

        if (strlen($telefone_unformat) != 10) {
            return $telefone_unformat;
        }

        $telefone_prefixo = substr($telefone_unformat, 0, 2);
        $telefone_pri = substr($telefone_unformat, 2, 4);
        $telefone_seg = substr($telefone_unformat, 6, 4);

        $telefone_format = "(" . $telefone_prefixo . ")" . $telefone_pri . "-" . $telefone_seg;
        return $telefone_format;
    }

    /**
     * @tutorial: Formata�ao pra numero de telefone
     * FormatHelper::unformatTelefone
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $tel
     * @return string $tel_unformat
     */
    public static function unformatTelefone($tel) {

        $telefone_format = $tel;

        $telefone_format = str_replace("(", "", $telefone_format);
        $telefone_format = str_replace(")", "", $telefone_format);
        $telefone_format = str_replace("-", "", $telefone_format);

        $telefone_unformat = $telefone_format;

        return $telefone_unformat;
    }

    /**
     * @tutorial: Formata�ao para numero decimal
     * FormatHelper::formatNumeroDecimal
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor
     * @return string $numero_format
     */
    public static function formatNumeroDecimal($valor) {

        $numero_format = $valor;

        $numero_format = str_replace(".", "", $numero_format);
        $numero_format = str_replace(",", ".", $numero_format);

        return $numero_format;
    }

    /**
     * @tutorial: Formata��o para n�mero em reais em decimal
     * FormatHelper::formatValorInteiro
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor (1200)
     * @return real $valorFomatado (1.200)
     */
    public static function formatValorInteiro($valor) {

        if ($valor == null)
            return null;

        $numberUnformat = $valor;

        $numberFormat = number_format($numberUnformat, 0, ',', '.');

        return $numberFormat;
    }

    /**
     * @tutorial: Formata��o de numero inteiro para numero monet�rio
     * FormatHelper::formatNumeroMonetario
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor
     * @return valor valor monetario
     */
    public static function formatNumeroMonetario($valor) {

        if ($valor == null)
            return null;

        $numberUnformat = $valor;

        $numberFormat = number_format($numberUnformat, 2, ',', '.');

        return $numberFormat;
    }

    /**
     * @tutorial: Formata�ao para numero decimal
     * FormatHelper::unformatNumeroDecimal
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor
     * @return string $numero_unformat
     */
    public static function unformatNumeroDecimal($valor) {

        $numero_format = $valor;

        $numero_unformat = str_replace(".", ",", $numero_format);


        return $numero_unformat;
    }

    /**
     * @tutorial: Formata�ao para numero da conta
     * FormatHelper::formatConta
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $contadigito
     * @return string $conta_format
     */
    public static function formatConta($contadigito) {

        $conta_unformat = $contadigito;

        $tamanho = strlen($conta_unformat);
        $cont = $tamanho - 1;

        $conta = substr($conta_unformat, 0, $cont);
        $digito = substr($conta_unformat, $cont, $tamanho);

        $conta_format = $conta . "-" . $digito;
        return $conta_format;
    }

    /**
     * @tutorial: Formata�ao para numero da conta
     * FormatHelper::unformatConta
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $contadigito
     * @return string $conta
     */
    public static function unformatConta($contadigito) {

        $conta_format = $contadigito;

        $conta = str_replace("-", "", $conta_format);


        return $conta;
    }

    /**
     * @tutorial: Formata�ao para numero da agencia
     * FormatHelper::formatAgencia
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $agenciadigito
     * @return string $agencia_format
     */
    public static function formatAgencia($agenciadigito) {

        $agencia_unformat = $agenciadigito;

        $tamanho = strlen($agencia_unformat);
        $cont = $tamanho - 1;

        $agencia = substr($agencia_unformat, 0, $cont);
        $digito = substr($agencia_unformat, $cont, $tamanho);

        $agencia_format = $agencia . "-" . $digito;
        return $agencia_format;
    }

    /**
     * @tutorial: Formata��o de uma string de qualquer forma desejada
     * FormatHelper::formatMascaras
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $mascara (data)##/##/## (cpf)###.###.###-## (hora)##:## 
     * @param type $string
     * @return type $string
     */
    public static function formatMascaras($mascara, $string) {
        $string = str_replace(" ", "", $string);
        for ($i = 0; $i < strlen($string); $i++) {
            $mascara[strpos($mascara, "#")] = $string[$i];
        }
        return $mascara;
    }

    /**
     * @tutorial: Formata�ao para data
     * FormatHelper::formatData
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $data
     * @return string $data_format
     */
    public static function formatData($data) {

        $data_unformat = $data;
        $ano = substr($data_unformat, 4, 4);
        $mes = substr($data_unformat, 2, 2);
        $dia = substr($data_unformat, 0, 2);
        $data_format = $dia . "/" . $mes . "/" . $ano;

        return $data_format;
    }

    /**
     * @tutorial: Formata�ao para data
     * FormatHelper::unformatData
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $data
     * @return string $unfor;
     */
    public static function unformatData($data) {

        $data_format = $data;

        $unfor = str_replace("/", "", $data_format);

        return $unfor;
    }

    /**
     * @tutorial: Fun��o limparString com os caracteres ("<", ">", "\\", "/", "=", "'", "?",".","-")
     * FormatHelper::limparString
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $string
     * @return type string
     */
    public static function limparString($string) {

        $get = str_replace(array("<", ">", "\\", "/", "=", "'", "?", ".", "-"), "", $string);

        return $get;
    }

    /**
     * @tutorial: Formata�ao para data
     * FormatHelper::dataNormalToInversa
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor
     * @return string $dataInversa
     */
    public static function dataNormalToInversa($valor) {

        $dataInversa = null;
        $isBarra = substr_count($valor, "/");

        if ($isBarra == 2) {
            $dataNormal = explode("/", $valor);
            $dataInversa = $dataNormal[2] . $dataNormal[1] . $dataNormal[0];
        } else {
            $unfor = str_replace("/", "", $valor);
            $dataInversa = substr($unfor, 4, 4) . substr($unfor, 2, 2) . substr($unfor, 0, 2);
        }

        return $dataInversa;
    }

    /**
     * @tutorial: Formata�ao para data
     * FormatHelper::dataInversaToNormal
     * @package system
     * @subpackage helpers
     * @access public
     * @param type $valor
     * @return string $dataInversa
     */
    public static function dataInversaToNormal($valor) {

        $dataInversa = null;
        $isBarra = substr_count($valor, "/");

        if ($isBarra != 0) {
            $dataNormal = explode("/", $valor);
            $dataInversa = $dataNormal[2] . $dataNormal[1] . $dataNormal[0];
        } else {
            $dataInversa = substr($valor, 6, 2) . substr($valor, 4, 2) . substr($valor, 0, 4);
        }

        return $dataInversa;
    }

    /**
     * @tutorial: Fun��o para retirar a concatena��o do Banco
     * FormatHelper::unconcatenarBD
     * @package system
     * @subpackage helpers
     * @access public
     * @param String $stringConcat
     * @return Array $array
     */
    public static function unconcatenarBD($stringConcat) {

        $array = null;

        if ($stringConcat == null) {
            return $stringConcat;
        }

        if (!is_string($stringConcat))
            throw new Exception("A fun��o recebe apenas STRING");

        if (strlen(':') < 1) {
            throw new Exception("A STRING n�o cont�m divisor necess�rio | : |");
        }

        $array = explode(':', substr_replace($stringConcat, '', 0, 1), -1);

        return $array;
    }

    /**
     * @tutorial: Fun��o para retirar a concatena��o do Banco
     * FormatHelper::gerarStringIN
     * @package system
     * @subpackage helpers
     * @access public
     * @param String $stringConcat
     * @return Array $array
     */
    public static function gerarStringIN(array $array, $param) {

        foreach ($array as $dados) {
            if (is_array($dados)) {
                $stringIN.= "," . $dados[$param];
            } elseif (is_object($dados)) {
                $reflex = new ReflectionClass(get_class($dados));
                $stringIN.= "," . $reflex->getMethod('get' . ucfirst($param))->invoke($dados);
            }
        }

        $stringIN = substr_replace($stringIN, "", 0, 1);
        return $stringIN;
    }

    public static function quebrarNome($string, $limiter = " ", $completo = false){
        
        $array = explode($limiter, $string);
        if(!$completo){
            $arrayExclusao = array('de','da','do','dos','das','e');
            foreach($arrayExclusao as $palavra){
                $key = array_search($palavra, $array);
                if($key)
                    unset($array[$key]);
            }
        }
        return $array;
    }
    
}

?>
