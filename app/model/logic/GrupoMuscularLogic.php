<?php

class GrupoMuscularLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new GrupoMuscularDAO());
    }
    
}
?>