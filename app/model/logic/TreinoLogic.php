<?php

class TreinoLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new TreinoDAO());
    }
    
}
?>