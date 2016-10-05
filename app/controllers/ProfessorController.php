<?php

class ProfessorController extends TWin8 {

    private $logic;

    public function __construct() {
        parent::__construct();
        $this->logic = new ProfessorLogic();
    }

    public function index(){
        $this->REDIRECT->setUrlParameter('id', $this->SECURITY->getUsuario()->getId());
        $this->REDIRECT->goToAction('informar');
    }


    public function cadastrar() {
        $this->HTML->setTitle("Personal Training Control´- Cadastro");
        $this->TPageSecondary('cadastro');
    }

    public function inserir() {
        $salvar = $this->logic->salvar($_POST);
        $this->REDIRECT->goToControllerAction('usuario');
    }
    
    public function listar() {

        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('novo')));

        $arrayObjAluno = $this->logic->listar("ide_professor = {$this->SECURITY->getUsuario()->getId()}");

        if (is_array($arrayObjAluno)) {
            $this->addDados('listAluno', $arrayObjAluno);
        } else {
            $this->addDados('listAluno', null);
        }

        unset($arrayObjAluno);

        $this->TPageSecondary('informa');
    }
    

    public function informar() {

        $this->HTML->setTitle("Personal Training Control´- Cadastro");

        # Add JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "MetroUI/pagecontrol.js");

        # Adicionar dados a view
        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('editar'), $this->getParam('id')));
        $objProfessor = $this->logic->obterPorId($this->getParam('id'));

        # Add JSON a view
        $this->addDados('professor', $objProfessor);
        $this->TPageSecondary('informa');
    }

    public function editar() {

        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.populate.js");
        # Objeto Professor
        $objProfessor = $this->logic->obterPorId($this->getParam('id'));
        # Add JSON a view
        $this->addDados('json_objeto', $this->logic->objectToJson($objProfessor));
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