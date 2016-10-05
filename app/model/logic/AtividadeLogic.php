<?php

class AtividadeLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new AtividadeDAO());
    }
    
}
?>