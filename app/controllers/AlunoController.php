<?php

class AlunoController extends TWin8 {

    private $logic;

    public function __construct() {
        parent::__construct();
        $this->logic = new AlunoLogic();
    }

    public function index() {
        $this->REDIRECT->goToAction("listar");
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

        $this->TPageSecondary('lista');
    }

    public function cadastrar() {
        $this->HTML->setTitle("Personal Training Control´- Cadastro");

        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");

        # Add dados a view
        $this->addDados('idProfessor', $this->SECURITY->getUsuario()->getId());

        $this->TPageSecondary('cadastro');
    }

    public function inserir() {

        if (isset($_POST['cadastrar'])) {
            
            $objProfessorLogic = new ProfessorLogic();
            $objProfessor = $objProfessorLogic->obterPorId($this->SECURITY->getUsuario()->getId(), false);
            $total = ($objProfessor->getAlunos() !== null) ? count($objProfessor->getAlunos()) : 0;
            $total = $total + 1;
            unset($objProfessor);
            $matriculaTmp  = (string) $total;
            unset($total);
            $tString = strlen($matriculaTmp);
            $matricula = "";
            
            # vai até 999
            if($tString < 4){
                $t = 4 - $tString;
                for ($i = 0; $i < $t; $i++) {
                    $matricula .= '0';
                }
            }
            $matricula .= $matriculaTmp . date('Y');
            
            $_POST['matricula'] = $matricula;
            $_POST['token'] = SecurityHelper::gerarSenhaRandomica();
                  
        }

        $salvar = $this->logic->salvar($_POST);

        $this->REDIRECT->goToAction("listar");
    }

    public function informar() {

        $this->HTML->setTitle("Personal Training Control´- Cadastro");

        # Add JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "MetroUI/pagecontrol.js");

        # Adicionar dados a view
        $this->addDados('toolbar', TWin8Helper::displayToolBar(__METHOD__, array('editar','treino','avaliar'), $this->getParam('id')));
        $objAluno = $this->logic->obterPorId($this->getParam('id'),true);

        # Add JSON a view
        $this->addDados('aluno', $objAluno);
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

        # Objeto Aluno
        $objAluno = $this->logic->obterPorId($this->getParam('id'));
        $objAluno->setTelefone(FormatHelper::formatTelefone($objAluno->getTelefone()));

        # Add JSON a view
        $this->addDados('json_objeto', $this->logic->objectToJson($objAluno));
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
    
    public function avaliar(){
        
        $this->HTML->setTitle("Personal Training Control´- Avaliação");

        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");

        # Add dados a view
        $this->addDados('idAluno', $this->getParam('id'));

        $this->TPageSecondary('avalia');
    }
    
    
    public function inserirAvaliacao(){
        #var_dump($_POST);exit();
        $avaliacaoLogic = new AvaliacaoLogic();
        $salvar = $avaliacaoLogic->salvar($_POST);
        
        if (!$salvar[0]) {
            $this->REDIRECT->setUrlParameter('id',$_POST['aluno']);
            $this->REDIRECT->setUrlParameter('feedback',1);
            $this->REDIRECT->goToAction("avaliar");
        } else {
            $this->REDIRECT->setUrlParameter('id',$_POST['aluno']);
            $this->REDIRECT->goToAction("informar");
        }
        
    }
    
    

      public function treinar(){
        
        $this->HTML->setTitle("Personal Training Control´- Treino");

        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");
        
        $objetivoLogic = new ObjetivoLogic(); 
        $this->addDados("listObjetivo", TFormHelper::optionSelect($objetivoLogic->listar(null, "nome")));
        
        $objExercicioLogic = new ExercicioLogic(); 
        $this->addDados("listExercicio", TFormHelper::optionSelect($objExercicioLogic->listar(null, "nome")));
        
        # Add dados a view
        $this->addDados('idProfessor', $this->SECURITY->getUsuario()->getId());
        $this->addDados('idAluno', $this->getParam('id'));


        $this->TPageSecondary('treino');
    }
    
    public function inserirTreino(){
       
        $atividades = $this->logic->organizarArrayAtividades($_POST);
        unset($_POST['atividade']);
        
        if(is_array($atividades)){
            $_POST['atividades'] = $atividades;
        }
        
        $treinoLogic = new TreinoLogic();
        $salvar = $treinoLogic->salvar($_POST);

        if(!$salvar[0]){
            $this->REDIRECT->setUrlParameter('id',$_POST['idAluno']);
            $this->REDIRECT->setUrlParameter('feedback',1);
            $this->REDIRECT->goToAction("treinar");
        }else{
            $this->REDIRECT->setUrlParameter('id',$_POST['idAluno']);
            $this->REDIRECT->goToAction("informar");
        }

    }
}

?>