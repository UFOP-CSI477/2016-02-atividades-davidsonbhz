<h1>Solicitar exame</h1>

<?php

    echo $this->Form->create('Exame', array('controller'=>'pacientes','url'=>'solicita_procedimento'));
    echo $this->Form->hidden('paciente_id', array( 'value' => $paciente)); 
    echo $this->Form->input('procedimento_id'); 
    echo $this->Form->date('data'); 
    echo $this->Form->end('Registrar'); 
    
    
?>
