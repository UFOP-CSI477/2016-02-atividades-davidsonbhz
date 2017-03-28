<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$cpf = $_REQUEST['cpf'];
if ($cpf === "___.___.___-__" || $cpf === "") {
    die("status=0;");
}

$cpf2 = str_replace("-", "", $cpf);
$cpf2 = str_replace(".", "", $cpf2);
$cpf2 = str_replace("_", "", $cpf2);


$lp = mysqli_fetch_assoc(mysqli_query($conexao, "select * from processoseletivo where status='ABERTO' limit 1"));
$processoseletivo = $lp['processoseletivo'];

$sql = "select * from candidato where cpf='$cpf' or cpf='$cpf2'";
$r = mysqli_query($conexao,$sql);
//-echo $sql . " n=".mysqli_num_rows($r)."   ";

//verifica se o candidato nao está impedido
if (mysqli_num_rows($r) > 0) {
    $l = mysqli_fetch_assoc($r);
    if ($l['status'] == "IMPEDIDO") {
        $status = 1;
    } else {
        $sql = "select * from candidato  where processoseletivo=$processoseletivo and (cpf='$cpf' or cpf='$cpf2')";
       // die("asjsjakdkas");
        $r = mysqli_query($conexao, $sql);
        if (mysqli_num_rows($r) > 0) {
            $status = 2;
            //die("kakakaka");
            include './cpfjaregistrado.php';
            die;
        } else {
            $status = 0;
        }
        
    }
} else {
    //die("pppppppp");
    $status = 0;
    
}

function qvar($vx, $cp) {
    return "$('#$cp').val('" . $vx[$cp] . "');";
}
