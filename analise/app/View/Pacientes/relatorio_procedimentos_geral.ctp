<h1>Relatorio por tipo de procedimento</h1>
<hr />

<table>
    <tr>
        <th>PROCEDIMENTO</th>
        <th>VALOR</th>
        <th>QTD</th>

    </tr>
    <?php
    $total = 0;
    $qtd = 0;

    foreach ($exames as $p):
        echo "<tr>";
        echo "<td>" . $p['p']['nome'] . "</td>";
        echo "<td>" . $p['p']['preco'] . " </td>";
        echo "<td>" . $p[0]['qtd'] . "</td>";
        echo "</tr>";
        $total = $total + $p['p']['preco'];
        $qtd = $qtd + $p[0]['qtd'];

    endforeach;
    ?>


    <tr>
        <th></th>
        <th>Total: <?= $total ?></th>
        <th>Total: <?= $qtd ?></th>
        <th></th>

    </tr>
</table>





