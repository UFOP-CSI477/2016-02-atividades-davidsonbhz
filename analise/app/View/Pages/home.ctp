
<?php

$tipo = $this->Session->read('CTipo');
if ($tipo == '1') {
    echo $this->Html->Link("Procedimentos", array('controller' => 'procedimentos', 'action' => 'index')) . "<br>";
    echo $this->Html->Link("Pacientes", array('controller' => 'pacientes', 'action' => 'index')) . "<br>";
    echo $this->Html->Link("Relatorio de procedimentos por paciente", array('controller' => 'pacientes', 'action' => 'relatorio_procedimentos_por_paciente')) . "<br>";
    echo $this->Html->Link("Relatorio de procedimentos geral", array('controller' => 'pacientes', 'action' => 'relatorio_procedimentos_geral')) . "<br>";
    echo $this->Html->Link("Sair", array('controller' => 'usuarios', 'action' => 'logout')) . "<br>";
} else if($tipo == '2') { 
    echo $this->Html->Link("Procedimentos", array('controller' => 'procedimentos', 'action' => 'index')) . "<br>";
    echo $this->Html->Link("Pacientes", array('controller' => 'pacientes', 'action' => 'index')) . "<br>";
    echo $this->Html->Link("Relatorio de procedimentos por paciente", array('controller' => 'pacientes', 'action' => 'relatorio_procedimentos')) . "<br>";
    echo $this->Html->Link("Relatorio de procedimentos geral", array('controller' => 'pacientes', 'action' => 'relatorio_procedimentos_geral')) . "<br>";
    echo $this->Html->Link("Sair", array('controller' => 'usuarios', 'action' => 'logout')) . "<br>";

} else if ($this->Session->read('CTipo') == '3') {
    echo $this->Html->Link("Solicitar procedimento", array('controller' => 'pacientes', 'action' => 'solicita_procedimento')) . "<br>";
    echo $this->Html->Link("Mostrar procedimentos", array('controller' => 'pacientes', 'action' => 'relatorio_procedimentos')) . "<br>";
    echo $this->Html->Link("Sair", array('controller' => 'usuarios', 'action' => 'logout')) . "<br>";
} else {
    echo $this->Html->Link("Sair", array('controller' => 'usuarios', 'action' => 'logout')) . "<br>";
}

