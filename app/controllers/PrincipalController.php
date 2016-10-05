<?php

/**
 * Description of PrincipalController
 * @author carina
 */
class PrincipalController extends TPtc {
    
    public function index() {
//        session_start();
//        $objProfessor = unserialize($_SESSION['user']);
//        var_dump($objProfessor);
//        $this->TPageSecondary("index");
        $this->REDIRECT->goToControllerAction('Ptc','home');      
         
    }
    

}

?>
