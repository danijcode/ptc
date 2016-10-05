<?php

class AdministratorController extends TWin8 {
    
    public function index() {
        
        $this->HTML->addJavaScript(PATH_JS_URL . $this->_controller. "/" . $this->_action . ".js");
        
        $arrayNome = FormatHelper::quebrarNome($this->SECURITY->getUsuario()->getNome());
        $this->addDados('nome', current($arrayNome));
        $this->addDados('sobrenome', end($arrayNome));
        unset($arrayNome);
        
        #id colaborador
        $this->addDados('idProfessor', $this->SECURITY->getUsuario()->getId());
        
        $this->addDados('avatar', 'default.jpg');
        
        $this->TMetro('index');
    }

}

?>
