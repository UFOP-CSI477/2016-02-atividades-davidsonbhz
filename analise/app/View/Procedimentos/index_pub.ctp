<h1>Sistema de gestão de procedimentos</h1>
<hr />

<table>
    <tr>
    <th>NOME</th>
    <th>PRECO</th>
    </tr>

<?php foreach($procedimentos as $p): ?>
    <tr>
    <td><?= $p['Procedimento']['nome'] ?> </td>
    <td><?= $p['Procedimento']['preco']; ?></td>
    </tr>


<?php endforeach; ?>


</table>

    <?=$this->Html->link('Inicio', "/")?>

