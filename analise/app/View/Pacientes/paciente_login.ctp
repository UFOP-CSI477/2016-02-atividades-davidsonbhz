<h1>Area do Paciente</h1>

<?php

    echo $this->Form->create('Paciente', array('controller'=>'pacientes','url'=>'login'));
    echo $this->Form->input('login');
    echo $this->Form->password('senha');
    echo $this->Form->end('Entrar');
    
?>

