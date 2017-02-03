<?php

class PacientesController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index() {

        $this->set('pacientes', $this->Paciente->find('all', array('order' => array('Paciente.nome' => 'asc'))));
    }

    public function view($id = null) {

        if (empty($this->request->data)) {
            $this->request->data = $this->Paciente->findById($id);
        } else {
            $this->Paciente->save($this->request->data);
            $this->Flash->set('Paciente atualizado');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function add() {


        if (empty($this->request->data)) {
            
        } else {
            $this->Paciente->save($this->request->data);
            $this->Flash->set('Paciente inserido');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function edit($id = null) {

        if (empty($this->request->data)) {
            $this->request->data = $this->Paciente->findById($id);
        } else {
            $this->Paciente->save($this->request->data);
            $this->Flash->set('Paciente atualizado');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function excluir($id = null) {
        $this->Paciente->delete($id);
        $this->redirect(array('action' => 'index'));
    }

    public function add_pub() {
        if (empty($this->request->data)) {
            
        } else {
            $this->Paciente->save($this->request->data);
            $this->Flash->set('Dados inseridos!');
            $this->redirect(array('action' => '/'));
        }
    }

    public function paciente_login() {
        
    }

    public function home() {
        
    }

    public function login() {
        if (!empty($this->data['Paciente']['login'])) {
            //validar
            $usuario = $this->validarPaciente();

            if ($usuario != false) {
                $this->Flash->set('Acesso de paciente ok');
                $this->Session->write('Usuario', $usuario);
                $this->Session->write('VTipo', 3);
                //$this->redirect(array('controller' => 'pacientes', 'action' => 'home'));
                 $this->redirect('/');
                exit();
            } else {

                $this->Flash->set('Usuario incorreto');
                $this->redirect(array('action' => 'paciete_login'));
                exit();
            }
        } else {
            $this->Flash->set('Usuario nao esta na sessao');
            $this->redirect(array('action' => 'paciente_login'));
            exit();
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect(array('action' => 'paciente_login'));
    }

    public function validarPaciente() {
        //verifica se o cara é um paciente
        $paciente = $this->Paciente->findAllByLoginAndSenha($this->data['Paciente']['login'], $this->data['Paciente']['senha']);
        if (!empty($paciente)) {
            return $paciente;
        } else {
            return false;
        }
    }

    public function solicita_procedimento() {

        $this->loadModel("Procedimento");
        $this->loadModel("Exame");

        if (empty($this->request->data)) {
            $paciente = $this->Session->read('Usuario');
            $this->set('procedimentos', $this->Procedimento->find('list', array('order' => array('Procedimento.nome' => 'asc'), 'fields' => array('id', 'nome'))));
            $this->set('paciente', $paciente[0]['Paciente']['id']);
        } else {
            $this->Exame->save($this->request->data);
            $this->Flash->set('Dados inseridos!');
            //$this->redirect(array('controller'=>'pacientes', 'action' => 'home'));
            $this->redirect('/');
        }
    }

    public function relatorio_procedimentos() {
        $paciente = $this->Session->read('Usuario');
        $this->loadModel("Exame");
        $exames = $this->Exame->findAllByPacienteId(array($paciente[0]['Paciente']['id']));
        $this->set('exames', $exames);
        
    }
    
    public function relatorio_procedimentos_geral() {
        $this->loadModel("Exame");
        $exames = $this->Exame->query('select p.id,p.nome,p.preco,e.data,count(p.id) qtd from procedimentos p inner join exames e on p.id=e.procedimento_id group by p.id');
        $this->set('exames', $exames);
        
    }
    
    public function relatorio_procedimentos_por_paciente() {
        $paciente = $this->Session->read('Usuario');
        $this->loadModel("Exame");
        $exames = $this->Exame->query("select Paciente.nome,Procedimento.nome,Exame.data,Procedimento.preco from pacientes as Paciente inner join exames as Exame on Paciente.id=Exame.paciente_id inner join procedimentos as Procedimento on Exame.procedimento_id=Procedimento.id order by Paciente.nome");
        $this->set('exames', $exames);
        
    }
}
