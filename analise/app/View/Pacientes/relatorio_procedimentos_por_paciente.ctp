<h1>Relatorio por tipo de procedimento</h1>
<hr />

<table>
    <tr>
        <th>PROCEDIMENTO</th>
        <th>VALOR</th>
        <th>QTD</th>
        <th>DATA</th>
    </tr>
    <?php
    $total = 0;
    $qtd = 0;

    foreach ($exames as $p):
        //Debugger::dump($p);
        echo "<tr>";
        echo "<td>" . $p['Paciente']['nome'] . "</td>";
        echo "<td>" . $p['Procedimento']['nome'] . "</td>";
        echo "<td>" . $p['Procedimento']['preco'] . " </td>";
        echo "<td>" . $p['Exame']['data'] . " </td>";
        echo "</tr>";
        $total = $total + $p['Procedimento']['preco'];
        $qtd = $qtd + 1;

    endforeach;
    ?>


    <tr>
        <th></th>        
        <th>Exames: <?= $qtd ?></th>
        <th>Total: <?= $total ?></th>
        <th></th>
        <th></th>

    </tr>
</table>





