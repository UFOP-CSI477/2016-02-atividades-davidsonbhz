<?php

$string = "String prá lá óòôõºö de avacalhada á à  âã asdas ª sd dd ä";


echo cleanString($string);


function cleanString($text) {
    
    $text = str_replace("'", " ", $text);
    $text = str_replace("\"", " ", $text);
    $text = preg_replace("/[áàâãªä]/", "a", $text);
    $text = preg_replace("/[ÁÀÂÃÄ]/", "A", $text);
    $text = preg_replace("/[ÍÌÎÏ]/", "I", $text);
    $text = preg_replace("/[íìîï]/", "i", $text);
    $text = preg_replace("/[éèêë]/", "e", $text);
    $text = preg_replace("/[ÉÈÊË]/", "E", $text);
    $text = preg_replace("/[óòôõºö]/", "o", $text);
    $text = preg_replace("/[ÓÒÔÕÖ]/", "O", $text);
    $text = preg_replace("/[úùûü]/", "u", $text);
    $text = preg_replace("/[ÚÙÛÜ]/", "u", $text);
    $text = preg_replace("/[ç]/", "c", $text);
    $text = preg_replace("/[Ç]/", "C", $text);
    
    return $text;
}

?>



teste