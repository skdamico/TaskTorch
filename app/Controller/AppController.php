<?php

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'workspaces', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'workspaces', 'action' => 'index')
        )
    );

    public function beforeFilter() {
        $this->set('user_logged_in', $this->Auth->user()); 
    }
}
