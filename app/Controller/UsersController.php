<?php 

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('register', 'logout'));
    }

    public function view($id = null) {
        if(!empty($id)) {
            // view other account
            $tmp = $this->User->find('first', array('recursive'=>-1, 'fields'=> array('User.username', 'User.email', 'User.id'), 'conditions'=> array('User.id'=>$id)));
            $this->set('user', array('username'=>$tmp['User']['username'], 'id' => $tmp['User']['id'], 'email' => $tmp['User']['email']));
        }
        else {
            // view own account
            $this->set('user', $this->Auth->user());
            $this->set('own_acct', true);
        }
    }
    public function login() {
        if($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } 
            else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }   
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('You have successfully registered!'));
                $this->Auth->login($this->request->data['User']);
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
