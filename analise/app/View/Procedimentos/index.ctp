<h1>Sistema de gestão de procedimentos</h1>
<hr />

<table>
    <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>PRECO</th>
    <th>-</th>
    <th>-</th>
    </tr>

<?php foreach($procedimentos as $p): ?>
    <tr>
    <td><?= $p['Procedimento']['id']; ?></td>
    <td><?= $this->Html->link($p['Procedimento']['nome'], array('controller'=>'procedimentos', 'action' => 'view', $p['Procedimento']['id'] )) ?> </td>
    <td><?= $p['Procedimento']['preco']; ?></td>
    <td><?=$this->Html->link('Editar', array('controller'=>'procedimentos', 'action' => 'edit', $p['Procedimento']['id'])) ?> </td>
    <td><?=$this->Html->link('Excluir', array('controller'=>'procedimentos', 'action' => 'excluir', $p['Procedimento']['id'])) ?> </td>
    
    </tr>


<?php endforeach; ?>


</table>
<?=$this->Html->link('Adicionar', array('controller'=>'procedimentos', 'action'=>'add'))?>


