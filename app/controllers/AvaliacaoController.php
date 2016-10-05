<?php

class AvaliacaoController extends TWin8 {

    private $logic;

    public function __construct() {
        parent::__construct();
        $this->logic = new AvaliacaoLogic();
    }

    public function index() {
        $this->REDIRECT->goToAction("listar");
    }

    public function informar() {

        $this->HTML->setTitle("Personal Training Control´- Cadastro");

        # Add JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "MetroUI/pagecontrol.js");

        # Adicionar dados a view
        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('editar'), $this->getParam('id')));
        $objAvaliacao = $this->logic->obterPorId($this->getParam('id'),true);

        # Add JSON a view
        $this->addDados('avaliacao', $objAvaliacao);
        $this->TPageSecondary('informa');
    }

    public function editar() {

        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.populate.js");

        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");

        # Objeto Avaliação
        $objAvaliacao = $this->logic->obterPorId($this->getParam('id'));
        
        # Add JSON a view
        $this->addDados('json_objeto', $this->logic->objectToJson($objAvaliacao));
        #Exibir view
        $this->TPageSecondary('edita');
    }

    public function atualizar() {

        $_POST['idUsuarioAtualizador'] = $this->logic->obterPorId($this->getParam('id'));
        
        $salvar = $this->logic->salvar($_POST, true);

        if ($salvar[0]) {
            $this->REDIRECT->setUrlParameter("id", $_POST['aluno']);
            $this->REDIRECT->goToControllerAction('aluno','informar');
        } else {
            #Retornar erros;
        }
    }
        
  
}

?>