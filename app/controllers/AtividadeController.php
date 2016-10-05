<?php

class AtividadeController extends TWin8{

    private $logic;

    public function __construct() {
        parent::__construct();
        $this->logic = new AtividadeLogic();
    }
    
    
    public function cadastrar() {
        $this->HTML->setTitle("Personal Training Control´- Cadastro");
       
        $exercicioLogic = new ExercicioLogic();
        $this->addDados("listExercicio", TFormHelper::optionSelect($exercicioLogic->listar(null, "nome")));
        
        $this->TPageSecondary('cadastro');
    }

    public function inserir(){
        $salvar = $this->logic->salvar($_POST);
        $this->REDIRECT->goToControllerAction("atividade");
    }
  
}

?>