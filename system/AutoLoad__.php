<?php

function __autoload($class) {

    if ( preg_match('/^T[^a-z]*$/', $class{0}) && preg_match('/^[^a-z]*$/', $class{1}) && preg_match("/Helper$/", $class) ) {
        $dir = PATH . "system/templates/helpers/";
    } elseif (preg_match('/^T[^a-z]*$/', $class{0}) && preg_match('/^[^a-z]*$/', $class{1})) {
        $dir = PATH . "system/templates/";
    }elseif (preg_match("/Helper$/", $class)) {
        $dir = PATH . "system/helpers/";
    } else if (preg_match("/Model$/", $class)) {
        $dir = PATH . "system/model/";
    } else if (preg_match("/ORM$/", $class)) {
        $dir = PATH . "system/orm/core/";
    } else if (preg_match("/DAL$/", $class)) {
        $dir = PATH . "system/orm/dal/";
    } else if (preg_match("/Strategy$/", $class)) {
        $dir = PATH . "system/orm/strategy/";
    } else if (preg_match("/Logic$/", $class)) {
        $dir = PATH . "app/model/logic/";
    } else if (preg_match("/DAO$/", $class)) {
        $dir = PATH . "app/model/dao/";
    } else {
        $dir = PATH . "app/model/entity/";
    }

    $path_class = $dir . $class . ".php";
    if (file_exists($path_class)) {
        require_once $path_class;
    }
}

?>
