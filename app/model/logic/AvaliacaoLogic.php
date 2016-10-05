<?php

class AvaliacaoLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new AvaliacaoDAO());
    }
    
}
?>