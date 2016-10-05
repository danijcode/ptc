<?php

class FormatORM {

    public static function clearString($string) {
        $string = str_replace(array("-", "/", ".", "\\", "(", ")",":"), "", $string);
        return $string;
    }

    public static function dataNormalToInversa($data) {
        $unfor = FormatORM::clearString($data);
        if(strlen($unfor) === 8){
            $dataInversa = substr($unfor, 4, 4) . substr($unfor, 2, 2) . substr($unfor, 0, 2);
            return $dataInversa;            
        }else{
            return "";
        }
    }

}

?>
