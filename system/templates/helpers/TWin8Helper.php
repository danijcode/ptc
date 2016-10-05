<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TWin8TemplateHelper
 *
 * @author igorsantos
 */
class TWin8Helper {
    
    public static function displayFeedback($valor) {

        if ($valor == 1) {
            return "<div class=\"charms\" id=\"msgPersist\">
                        <br/>
                        <ul class=\"replies\">
                            <li class=\"bg-color-green\">
                                <b class=\"sticker sticker-right sticker-color-green\"></b>
                                <div class=\"avatar\"><img src=\"images/myface.jpg\"></div>
                                <div class=\"reply\">
                                    <div class=\"date\">" . date("d-m-Y", mktime()) . "</div>
                                    <div class=\"author\">Sucesso!</div>
                                    <div class=\"text\">Email enviado com dados para recuperação de senha.</div>
                                </div>
                            </li>
                        </ul>
                    </div>";
        }elseif ($valor == 2) {
            return "<div class=\"charms\" id=\"msgPersist\">
                        <br/>
                        <ul class=\"replies\">
                            <li class=\"bg-color-green\">
                                <b class=\"sticker sticker-right sticker-color-green\"></b>
                                <div class=\"avatar\"><img src=\"images/myface.jpg\"></div>
                                <div class=\"reply\">
                                    <div class=\"date\">" . date("d-m-Y", mktime()) . "</div>
                                    <div class=\"author\">Sucesso!</div>
                                    <div class=\"text\">Solicitação de alteração de senha concluida.</div>
                                </div>
                            </li>
                        </ul>
                    </div>";
        } else {
            return "<div class=\"charms\" id=\"msgPersist\">
                        <br/>
                        <ul class=\"replies\">
                            <li class=\"bg-color-red\">
                                <b class=\"sticker sticker-right sticker-color-red\"></b>
                                <div class=\"avatar\"><img src=\"images/myface.jpg\"></div>
                                <div class=\"reply\">
                                    <div class=\"date\">" . date("d-m-Y", mktime()) . "</div>
                                    <div class=\"author\">Erro!</div>
                                    <div class=\"text\">Ocorreu um problema ao tentar salvar as informações.</div>
                                </div>
                            </li>
                        </ul>
                    </div>";
        }
    }
    
    public static function displayToolBar($scopo, array $icons = array(),$id=""){
        return TToolBarHelper::getInstancia()->getToolBar($scopo, $icons,$id);
    }
    
    public static function displayIniStart($image,$url = "Principal") {
        
        return "<div id='ini-start'>
                    <div id='start'>
                        <a href='".PATH_URL."index.php?{$url}'>
                            <img src='{$image}' width='120px' height='75px'>
                        </a>
                    </div>
                </div>";
    }
    
}

?>
