<?php

$string = "String pr� l� ������ de avacalhada � �  �� asdas � sd dd �";


echo cleanString($string);


function cleanString($text) {
    
    $text = str_replace("'", " ", $text);
    $text = str_replace("\"", " ", $text);
    $text = preg_replace("/[�����]/", "a", $text);
    $text = preg_replace("/[�����]/", "A", $text);
    $text = preg_replace("/[����]/", "I", $text);
    $text = preg_replace("/[����]/", "i", $text);
    $text = preg_replace("/[����]/", "e", $text);
    $text = preg_replace("/[����]/", "E", $text);
    $text = preg_replace("/[������]/", "o", $text);
    $text = preg_replace("/[�����]/", "O", $text);
    $text = preg_replace("/[����]/", "u", $text);
    $text = preg_replace("/[����]/", "u", $text);
    $text = preg_replace("/[�]/", "c", $text);
    $text = preg_replace("/[�]/", "C", $text);
    
    return $text;
}

?>



teste