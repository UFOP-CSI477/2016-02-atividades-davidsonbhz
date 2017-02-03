<?php

class UsuariosController extends AppController {

    public $helpers = array('Form');
    public $components = array('Flash');

    public function index_login() {
        
    }
    
    public function inicio() {
        
    }

    public function validar() {
        $usuario = $this->Usuario->findAllByLoginAndSenha($this->data['Usuario']['login'], $this->data['Usuario']['senha']);

        if (!empty($usuario)) {
            return $usuario;
        } else {
            return false;
        }
    }

    public function validarPaciente() {
        //verifica se o cara é um paciente
        $this->loadModel("Paciente");
        $paciente = $this->Paciente->findAllByLoginAndSenha($this->data['Usuario']['login'], $this->data['Usuario']['senha']);
        if (!empty($paciente)) {
            return $paciente;
        } else {
            return false;
        }
    }

    public function login() {
        if (!empty($this->request->data['Usuario']['login'])) {
            //validar
            $tipo = $this->request->data['Usuario']['ctipo'];

            if ($tipo == '3') {
                $usuario = $this->validarPaciente();
                if ($usuario != false) {
                    $this->Flash->set('Acesso de paciente');
                    $this->Session->write('Usuario', $usuario);
                    $this->Session->write('VTipo', $tipo);
                    $this->Session->write('CTipo', $tipo);

                    $this->redirect('/');
                    exit();
                } else {

                    $this->Flash->set('Usuario incorreto');
                    $this->redirect(array('action' => 'index_login'));
                    exit();
                }
            } else {

                $usuario = $this->validar();

                if ($usuario != false) {
                    $this->Flash->set('Acesso ok');
                    $this->Session->write('Usuario', $usuario);
                    $this->Session->write('VTipo', 1);
                    $this->Session->write('CTipo', $tipo);

                    $this->redirect('/');
                    exit();
                } else {

                    $this->Flash->set('Usuario incorreto');
                    $this->redirect(array('action' => 'index_login'));
                    exit();
                }
            }
        } else {
            $this->Flash->set('Usuario nao esta na sessao');
            $this->redirect(array('action' => 'index_login'));
            exit();
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect(array('controller'=>'usuarios', 'action' => 'inicio'));
    }

}
