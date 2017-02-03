<?php


class Exame extends AppModel {
    
    public $belongsTo = array (
        'Paciente' => array (
            'foreignKey' => 'paciente_id'
        ),
        'Procedimento' => array (
            'foreignKey' => 'procedimento_id'
        )   
    );
    

}


