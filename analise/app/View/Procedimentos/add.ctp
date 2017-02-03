Inserir procedimento
<hr>
<?php
echo $this->Form->create('Procedimento');
echo $this->Form->input('nome');
echo $this->Form->input('preco');
echo $this->Form->input('usuario_id');

echo $this->Form->end('Salvar');
?>

