<?php

class PtcController extends TPtc {

    public function index() {
        $this->REDIRECT->goToAction('home');
    }

    public function home() {
        $this->TPageSecondary("home");
    }

    public function usuario() {
        $this->HTML->setTitle("Personal Training Control´- Cadastro");
        
        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");
        
        if($this->isParam('feedback')){
            $this->addDados('feedback', ($this->getParam('feedback') == 1) ? true : false);
        }
       
        $this->TPageSecondary('usuario');
    }
    
    public function inserirProfessor(){
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
            $objProfessorLogic = new ProfessorLogic();
            $salvar = $objProfessorLogic->salvar($_POST);
        
            if (!$salvar) {
                $this->REDIRECT->setUrlParameter("feedback", 1);
                $this->REDIRECT->goToAction('usuario');
            } else {
                $this->REDIRECT->setUrlParameter("feedback", 2);
                $this->REDIRECT->goToAction('usuario');
            }
            
        } else {
            $this->REDIRECT->goToAction('usuario');
        }
    }
        
        
        //$this->REDIRECT->goToAction('usuario');
   // }

    public function parceiros() {
        $this->HTML->setTitle("Personal Training Control´- Parceiros");
        $this->TPageSecondary('parceiros');
    }

    public function planos() {
        $this->HTML->setTitle("Personal Training Control´- Parceiros");
        $this->TPageSecondary('planos');
    }
    
    public function contato() {
        $this->HTML->setTitle("Personal Training Control´- Contato");
        
        # Adicionar JS
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "util.validate.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "mask.js");
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . 'core.js');
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller . "/" . $this->_action . ".js");
        
        if($this->isParam('feedback')){
            $this->addDados('feedback', ($this->getParam('feedback') == 1) ? true : false);
        }
        
        $this->TPageSecondary('contato');
    }

    public function enviarContato() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $remetente = array();
            $remetente['email'] = $_POST['email'];
            $remetente['nome'] = $_POST['nome'];

            $assunto = $_POST['assunto'];

            $mensagem = 'Nome: ' . $_POST['nome'] . '<br>';
            $mensagem .= 'E-mail: ' . $_POST['email'] . '<br>';
            $mensagem .= 'Cidade: ' . $_POST['cidade'] . '<br>';
            $mensagem .= 'Telefone: ' . $_POST['telefone'] . '<br><br>';
            $mensagem .= '-------------------- MENSAGEM --------------------<br>';
            $mensagem .= $_POST['mensagem'] . '<br>';
            $mensagem .= '--------------------------------------------------<br>';

            $email = new EmailHelper($remetente);
            $email->addDestinatario("personaltrainingcontrol@gmail.com", "Suporte - Personal");
            $email->mail($assunto, $mensagem);
            $envio = $email->sendMail();

            if (!$envio) {
                $this->REDIRECT->setUrlParameter("feedback", 1);
                $this->REDIRECT->goToAction('contato');
            } else {
                $this->REDIRECT->setUrlParameter("feedback", 2);
                $this->REDIRECT->goToAction('contato');
            }
            
        } else {
            $this->REDIRECT->goToAction('contato');
        }
    }
    

}

?>