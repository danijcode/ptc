<?php

class AlunoLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new AlunoDAO());
    }

    public function organizarArrayAtividades(Array $dados) {
        
        $arrayAtividades = array();
        $atividade = $dados['atividade'];

        $contador = 0;
        foreach ($atividade['exercicio'] as $key => $nome) {
            
            if ($nome !== '' && $atividade['series'][$key] !== '' && $atividade['repeticoes'][$key] !== '' && $atividade['carga'][$key] !== '') {
                
                $arrayAtividades[$contador]['exercicio'] = $nome;
                $arrayAtividades[$contador]['serie'] = $atividade['series'][$key];
                $arrayAtividades[$contador]['repeticoes'] = $atividade['repeticoes'][$key];
                $arrayAtividades[$contador]['carga'] = $atividade['carga'][$key];
                $contador++;
                
            }
            
        }
        
        return (count($arrayAtividades > 0)) ? $arrayAtividades : false;
    }

}

?>