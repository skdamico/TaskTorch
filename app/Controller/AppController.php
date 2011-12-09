<?php

if (Configure::read('debug') > 0) {
    App::import('Vendor', array('file' => 'FirePHPCore/FirePHP.class.php'));
}
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'workspaces', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        'DebugKit.Toolbar'
    );

    public function beforeFilter() {
        $this->set('user_logged_in', $this->Auth->user()); 
    }
}
