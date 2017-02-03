<h1>Sistema de gestao de procedimentos</h1>
<hr />

<table>
    <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>PRECO</th>
    <th>-</th>
    
    </tr>

<?php foreach($exames as $p): ?>
    <tr>
    <td><?= $p['Exame']['id']; ?></td>
    <td><?= $this->Html->link($p['Exame']['nome'], array('controller'=>'procedimentos', 'action' => 'view', $p['Exame']['id'] )) ?> </td>
    <td><?= $p['Exame']['preco']; ?></td>
    <td><?=$this->Html->link('Editar', array('controller'=>'procedimentos', 'action' => 'edit', $p['Exame']['id'])) ?> </td>
    </tr>


<?php endforeach; ?>


</table>


