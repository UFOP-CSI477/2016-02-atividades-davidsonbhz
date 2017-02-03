<h1>Sistesma de Cadastro e Exames</h1>
<hr>



<?php
echo $this->Form->create('Usuario', array('controller' => 'usuarios', 'url' => 'login'));
echo $this->Form->input('login');
echo $this->Form->password('senha');
echo $this->Form->input('ctipo', array('type' => 'select', 'options' => array(3 => 'CLIENTE', 2 => 'OPERADOR', 1 => 'ADMINISTRADOR')));

echo $this->Form->end('Entrar');
?>

<hr>
Area publica: 
<ul>
    <li><?= $this->Html->link('Procedimentos', array('controller' => 'procedimentos', 'action' => 'index_pub')) ?></li>
    <li><?= $this->Html->link('Cadastrar-se', array('controller' => 'pacientes', 'action' => 'add_pub')) ?></li>

</ul>