<?php

include './conexao.php';

$t = time();
if(isset($_REQUEST['r'])) {
    $r = $_REQUEST['r'];
    //echo "dif: ".($t-$r)."<br>";
    if($t>($r+10)) {
        echo "<a href='limpar.php'>timeout! voltar</a>";
        die;
    } else {
        echo "Limpando...";
        mysqli_query($conexao, "delete from candidato");
        echo "<a href='limpar.php'>voltar</a>";
        die;
    }
}

$l = mysqli_fetch_assoc(mysqli_query($conexao, "select count(*) t from candidato"));
echo "Registros: ".$l['t'];
?>
<hr>
<a href="limpar.php?r=<?=$t?>">serio mesmo?</a>