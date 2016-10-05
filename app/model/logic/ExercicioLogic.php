<?php

class ExercicioLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new ExercicioDAO());
    }
    
}
?>