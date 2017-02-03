<?php

class ExamesController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Flash');
        
    public function index() {

        $this->set('exames', $this->Exame->find('all'));

    }

    public function view($id = null) {

        if(!$id) {
            throw new NotFoundException("Exame invalido");
        }     

        $procedimento = $this->Exame->findById($id);
        $this->set('exames', $procedimento);

    }

    public function  add() {
        $pacientes = $this->Exame->Paciente->find('list', array('fields'=>array('id', 'nome')));
        $this->set('pacientes', $pacientes);
        if(empty($this->request->data)) {
            
        } else {
            $this->request['usuario_id']=1;
            $this->Procedimento->save($this->request->data);
            $this->Flash->set('Exame inserido');
            $this->redirect(array('action'=>'index'));
        }
        
    }
    
    
    public function  edit($id = null) {
        $pacientes = $this->Exame->Paciente->find('list', array('fields'=>array('id', 'nome')));
        $this->set('pacientes', $pacientes);
        
        if(empty($this->request->data)) {
            $this->request->data = $this->Exame->findById($id);
            
        } else {
            $this->Exame->save($this->request->data);
            $this->Flash->set('Exame atualizado');
            $this->redirect(array('action'=>'index'));
        }
        
    }

}


