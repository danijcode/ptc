<?php

class ExercicioController extends TWin8 {

    private $logic;

    public function __construct() {
        parent::__construct();
        $this->logic = new ExercicioLogic();
    }
    
    public function index(){
	$this->REDIRECT->goToAction("listar");
    }
    
    public function listar(){
	//$this->logic->listar();
        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('novo')));
        
        $arrayObjExercicio = $this->logic->listar(null,'nome',true);

        if (is_array($arrayObjExercicio)) {
            $this->addDados('listExercicio', $arrayObjExercicio);
        } else {
            $this->addDados('listExercicio', null);
        }

        unset($arrayObjExercicio);
        
        $this->TPageSecondary('lista');
	}
    
    
    public function cadastrar() {
        $this->HTML->setTitle("Personal Training Control´- Cadastro");
        
        $grupoMuscularLogic = new GrupoMuscularLogic();
        $this->addDados("listGrupoMuscular", TFormHelper::optionSelect($grupoMuscularLogic->listar(null, "nome")));
        $this->TPageSecondary('cadastro');
    }

    public function inserir(){
        $salvar = $this->logic->salvar($_POST);
        $this->REDIRECT->goToControllerAction("exercicio");
    }
    
    public function informar() {

        $this->HTML->setTitle("Personal Training Control´- Cadastro");

        # Add JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "MetroUI/pagecontrol.js");

        $grupoMuscularLogic = new GrupoMuscularLogic();
        $this->addDados("listGrupoMuscular", TFormHelper::optionSelect($grupoMuscularLogic->listar(null, "nome")));
        
        # Adicionar dados a view
        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('editar'), $this->getParam('id')));
        $objExercicio = $this->logic->obterPorId($this->getParam('id'));

        # Add JSON a view
        $this->addDados('exercicio', $objExercicio);
        $this->TPageSecondary('informa');
    }

    public function editar() {

        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.populate.js");
        
        # Objeto Grupo Muscular
        $grupoMuscularLogic = new GrupoMuscularLogic();
        $this->addDados("listGrupoMuscular", TFormHelper::optionSelect($grupoMuscularLogic->listar(null, "nome")));
        
        # Objeto Exercicio
        $objExercicio = $this->logic->obterPorId($this->getParam('id'));
        
        # Add JSON a view
        $this->addDados('json_objeto', $this->logic->objectToJson($objExercicio));
        
        #Exibir view
        $this->TPageSecondary('edita');
    }
    
    public function atualizar() {

        $_POST['idUsuarioAtualizador'] = $this->logic->obterPorId($this->getParam('id'));
        $_POST['dataAtualizacao'] = time();

        $salvar = $this->logic->salvar($_POST, true);

        if ($salvar[0]) {
            $this->REDIRECT->setUrlParameter("id", $_POST['id']);
            $this->REDIRECT->goToAction('informar');
        } else {
            #Retornar erros;
        }
    }
    

  
}

?>