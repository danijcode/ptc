<?php

class AlunoTreinamentoLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new AlunoTreinamentoDAO());
    }
    
}
?>