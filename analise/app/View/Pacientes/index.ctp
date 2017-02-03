<h1>Pacientes</h1>
<hr />

<table>
    <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>-</th>
    
    </tr>

<?php foreach($pacientes as $p): ?>
    <tr>
    <td><?= $p['Paciente']['id']; ?></td>
    <td><?= $this->Html->link($p['Paciente']['nome'], array('controller'=>'pacientes', 'action' => 'view', $p['Paciente']['id'] )) ?> </td>
    <td><?= $this->Html->link('Excluir', array('controller'=>'pacientes', 'action'=>'excluir', $p['Paciente']['id'])) ?></td>
    
    </tr>


<?php endforeach; ?>


</table>

<?=$this->Html->link('Adicionar', array('controller'=>'pacientes', 'action'=>'add'))?>



