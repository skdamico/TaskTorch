<?php 

class WorkspacesController extends AppController {
    public $name = 'Workspaces';

    public function index() {
        $this->set('workspaces', $this->Workspace->find('all'));
    }

    public function edit($id = null) {
        $this->set('workspace', $this->Workspace->read(null, $id));
    }
}
