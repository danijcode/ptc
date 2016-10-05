<?php


class TPtc extends Controller {

    public $HTML;

    public function __construct() {
        parent::__construct();
        $this->HTML = new THtmlHelper();
        define("PATH_TEMPLATE_URL", PATH_WEBFILES_URL . "templates/" . __CLASS__ . "/");
        define("PATH_VIEW_TEMPLATE_CORE", VIEWS . "core/");
    }

    public function init() {

        parent::init();

        # Definir icon padrão do sistema
        $this->HTML->setIcon(PATH_IMAGE_URL . "favicon.ico");
        
        # Adicionar Meta 
        $this->HTML->addMetaTag('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        
        # Adicionar JS Default
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "bootstrap.min.js",true); // 2 a entrar
        
        # Adicionar JQuery
        $this->HTML->addJavaScript(PATH_JS_CORE_URL . "jquery.js",true); // 1 a entrar

        # Adiconar css

        $this->HTML->addCss(PATH_TEMPLATE_URL . "css/bootstrap-responsive.css", "screen", true); //3 entrar
        $this->HTML->addCss(PATH_TEMPLATE_URL . "css/style.css", "screen", true); //2 entrar
        $this->HTML->addCss(PATH_TEMPLATE_URL . "css/bootstrap.css", "screen", true); //1 entrar
    }


    public function TStart($nome) {
        
        # Inicia o buffer
        ob_start();

        # Incluir view no tamplate 
        $this->view($nome);
        
        # Pegar view e aloca numa variavel
        $content = ob_get_clean();
        
        # Adicionar CSS
        //$this->HTML->addCss(PATH_TEMPLATE_URL . "css/xxxxxxx.css");

        # Adicionar a view ao Body
        $this->HTML->setBodyContent($content);

        # Imprime o HTML
        echo $this->HTML->getHtml();
        
    }
    
    public function TPageSecondary($nome) {
        
        # Inicia o buffer
        ob_start();
        
        #cabeçalho
        require_once PATH_VIEW_TEMPLATE_CORE."topo.phtml";
        # Incluir view no tamplate 
        $this->view($nome);
        #Rodapé
        require_once PATH_VIEW_TEMPLATE_CORE."rodape.phtml";
            
        # Pegar view e aloca numa variavel
        $content = ob_get_clean();

        # Adicionar a view ao Body
        $this->HTML->setBodyContent($content);

        # Imprime o HTML
        echo $this->HTML->getHtml();
        
    }
    
}

?>
