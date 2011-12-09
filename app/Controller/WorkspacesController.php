<?php 

class WorkspacesController extends AppController {
    public $name = 'Workspaces';
    public $components = array('RequestHandler');

    public $paginate = array('joins' => array(
       array( 
           'table' => 'users_workspaces', 
           'alias' => 'UserWorkspace', 
           'type' => 'inner',  
           'conditions'=> array('UserWorkspace.workspace_id = Workspace.id') 
       ), 
       array( 
           'table' => 'users', 
           'alias' => 'User', 
           'type' => 'inner',  
           'conditions'=> array( 
               'User.id = UserWorkspace.user_id'
           )
       )));

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->set('workspaces', $this->paginate(array('User.id'=> $this->Auth->user('id')))); 
    }

    public function edit($id = null) {
        $this->set('workspace', $this->Workspace->read(null, $id));
    }

    public function add() {
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }
        if(!empty($this->data)) {
            $this->Workspace->create();
            $tmp['User']['user_id'] = $this->Auth->User('id');
            $tmp['Workspace']['name'] = $this->data['Workspace']['name'];
            if ($this->Workspace->save($tmp)) {
                echo $this->Workspace->id;
            }
        }
    }
}
