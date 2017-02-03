<?php

class ProcedimentosController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index() {

        $this->set('procedimentos', $this->Procedimento->find('all', array('order' => array('Procedimento.nome' => 'asc'))));
    }

    public function index_pub($id = null) {
        $this->set('procedimentos', $this->Procedimento->find('all', array('order' => array('Procedimento.nome' => 'asc'))));
    }

    public function view($id = null) {

        if (!$id) {
            throw new NotFoundException("Procedimento invalido");
        }

        $procedimento = $this->Procedimento->findById($id);
        $this->set('procedimentos', $procedimento);
    }

    public function add() {
        $usuarios = $this->Procedimento->Usuario->find('list', array('fields' => array('id', 'nome')));
        $this->set('usuarios', $usuarios);
        if (empty($this->request->data)) {
            
        } else {
            $this->request['usuario_id'] = 1;
            $this->Procedimento->save($this->request->data);
            $this->Flash->set('Procedimento inserido');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function edit($id = null) {
        $usuarios = $this->Procedimento->Usuario->find('list', array('fields' => array('id', 'nome')));
        $this->set('usuarios', $usuarios);

        if (empty($this->request->data)) {
            $this->request->data = $this->Procedimento->findById($id);
        } else {
            $this->Procedimento->save($this->request->data);
            $this->Flash->set('Procedimento atualizado');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function excluir($id = null) {
        $this->Procedimento->delete($id);
        $this->redirect(array('action'=>'index'));
    }
    

}
