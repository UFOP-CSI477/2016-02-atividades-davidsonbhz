<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    
    public function validarAcesso($tipo) {
        
    } 
    
    public function afterFilter() {
        $areaspublicas = array('inicio', 'index_login', 'index_pub', 'add_pub', 'paciente_login');
        
        //die("a=".$this->action);
        if (!in_array($this->action, $areaspublicas)) {
            $this->autenticar();
        }

        /*
        if ($this->Session->read('CTipo') != null) {
            $areascliente = array('ver_relatorio', 'solicitar_procedimento');

            $tipo = $this->Session->read('CTipo');
            die("tipo=$tipo");
            if ($tipo == 3) {
                if (!in_array($this->action, $areascliente)) {
                    $this->Flash->set('Acesso negado a esta funcao');
                    $this->redirect("/");
                    exit();
                }
            }
        }*/
        
        
        
        
    }

    public function autenticar() {
        if (!$this->Session->check('Usuario')) {
            //$this->redirect(array('controller' => 'usuarios', 'action' => 'index_login'));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'inicio'));
            exit;
        } else {
            $usuario = $this->Session->read('Usuario');
            //echo var_dump($usuario);
            if (isset($usuario[0]['Usuario'])) {
                $this->Flash->set('Bem vindo ' . $usuario[0]['Usuario']['nome']);
            }
            if (isset($usuario[0]['Paciente'])) {
                $this->Flash->set('Bem vindo ' . $usuario[0]['Paciente']['nome']);
            }
        }
    }

}
