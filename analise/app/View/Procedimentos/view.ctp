Detalhes do procedimento
<hr>
<?php
echo $this->Form->create('Procedimento');
echo $this->Form->input('id');
echo $this->Form->input('nome');
echo $this->Form->input('preco');
echo $this->Form->input('usuario_id');
