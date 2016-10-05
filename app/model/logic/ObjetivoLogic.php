<?php

class ObjetivoLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new ObjetivoDAO());
    }
    
}
?>