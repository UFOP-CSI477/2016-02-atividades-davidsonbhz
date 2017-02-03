Inserir procedimento
<hr>
<?php
echo $this->Form->create('Paciente');
echo $this->Form->input('nome');
echo $this->Form->input('login');
echo $this->Form->input('senha');

echo $this->Form->end('Salvar');
?>

