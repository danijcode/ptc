<?php

/**
 * @package HELPERS 
 */
class TToolBarHelper {

    private $mapa;
    private static $instancia = null;
    private $escopo;
    private $_security;

    /*
     * ACTFactory::getInstancia
     *
     * @package HELPERS
     * @param Void
     * @return Objeto ACTFactory
     * @tutorial: Verifica se existe uma instancia do Objeto ACTFactory, caso contrario
     * da um new e retorna o objeto
     */

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new TToolBarHelper();
        }
        return self::$instancia;
    }

    /*
     * ACTFactory::__clone
     *
     * @package HELPERS
     * @param Void
     * @return Null
     * @tutorial: Impede que este objeto seja clonado
     * @exception: Clone nao e permitido.
     */

    public function __clone() {
        trigger_error('Clone não é permitido.', E_USER_ERROR);
    }

    public function TToolBarHelper() {
        $this->_security = SecurityHelper::getInstancia();
        $this->mapa = array(
            'novo:cadastrar' => 'icon-new:false',
            'editar:editar' => 'icon-copy:false',
            'avaliar:avaliar' => 'icon-stats-up:false',
            'treino:treinar' => ' icon-accessibility:false',
            'pleitear:cadastrar' => 'icon-user-3:false',
            'imprimir:#' => 'icon-printer:true',
            'localizar:#' => 'icon-search:true',
            'excluir:deletar'=>'icon-remove:false'
        );

    }

    private function criarButton($dados, $icon) {
        
        $arrayId = array('editar','pleitear','avaliar','treino');
        $cont = substr($this->escopo, 0, strpos($this->escopo, 'Controller'));
        $acti = substr($dados, strpos($dados, ':') + 1, strlen($dados));
        
        //if($this->_security->isAllowed(strtolower($cont."_".$acti))){
            if (substr($dados, strpos($dados, ':') + 1, strlen($dados)) == '#') {
                $url = '#';
            } else {
                $url = "index.php?" . $cont . "/" . $acti;
                if(in_array(substr($dados, 0, strpos($dados, ':')), $arrayId)){
                    $url.= "/id" . "/" . substr($_SERVER['QUERY_STRING'], 
                            strpos($_SERVER['QUERY_STRING'], 'id/') + 3 , strlen($_SERVER['QUERY_STRING']));
                }
            }

            if(substr($dados, 0, strpos($dados, ':')) == 'pleitear'){
                $bad = "<span class='badge'>100</span>";
            }

            return "<a href='{$url}' id='" . substr($dados, 0, strpos($dados, ':')) . "'>
                        <button class='shortcut'>
                            <span class='icon'>
                                <i class='" . substr($icon, 0, strpos($icon, ':')) . "'></i>
                            </span>
                            <span class='label'>" . ucfirst(substr($dados, 0, strpos($dados, ':'))) . "</span>
                        </button>
                    </a>";
        //} else {
         //   return "";
       // }
    }

    public function getToolBar($escopo, array $icons) {

        $this->escopo = $escopo;
        
        $toolbar = "";
        foreach ($this->mapa as $key => $flag) {

            if (!in_array(substr($key, 0, strpos($key, ':')), $icons)) {

                if (strcasecmp(substr($flag, strpos($flag, ':') + 1, strlen($flag)), "true") == 0) {
                    $toolbar.= $this->criarButton($key, $flag);
                }
                
            } else {
                $toolbar.= $this->criarButton($key, $flag);
            }
        }

        return $toolbar;
    }

}

?>
