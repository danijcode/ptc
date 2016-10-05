<?php

class ProfessorLogic extends LogicModel {

    public function __construct() {
        parent::__construct(new ProfessorDAO());
    }
    
}
?>