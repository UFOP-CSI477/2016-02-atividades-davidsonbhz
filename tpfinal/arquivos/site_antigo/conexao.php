<?php

/*
if ($_SERVER['REMOTE_ADDR']==="127.0.0.1") {
    $conexao = mysql_connect("localhost", "root", "yawten");    
    mysql_select_db("prevestibular", $conexao);
} else {
    $conexao = mysql_connect("mysql01.rumoauniversidade1.hospedagemdesites.ws", "rumoauniversid", "ufop2016") or die(mysql_error());
    mysql_select_db("rumoauniversid", $conexao);
}
*/

    $conexao = mysqli_connect("localhost", "rumoau", "hqy30sx") or die(mysql_error());
    mysqli_select_db($conexao, "rumoau");


