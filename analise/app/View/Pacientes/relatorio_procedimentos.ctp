<h1>Pacientes</h1>
<hr />

<table>
    <tr>
    <th>NOME</th>
    <th>PRECO</th>
    <th>DATA</th>
    
    </tr>
<?php
$total = 0;

foreach($exames as $p):
    echo "<tr>";
    echo "<td>".$p['Procedimento']['nome']."</td>";
    echo "<td>".$p['Procedimento']['preco']." </td>";
    echo "<td>".$p['Exame']['data']. "</td>";
    
    echo "</tr>";
    $total = $total + $p['Procedimento']['preco'];
    
endforeach;

?>

   
<tr>
    <th></th>
    <th>Total: <?=$total?></th>
    <th></th>
    
    </tr>
</table>

<?=$this->Html->Link("Solicitar procedimento", array('controller' => 'pacientes', 'action' => 'solicita_procedimento'))?>



