<?php

if (Configure::read('debug') > 0) {
    App::import('Vendor', array('file' => 'FirePHPCore/FirePHP.class.php'));
}
class AppController extends Controller {
    
    public $components = array('DebugKit.Toolbar');
}
