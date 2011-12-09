<?php

class PostsController extends AppController {

    public $name = 'Posts';
    public $components = array('RequestHandler');

    public function add() {
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }
        if(!empty($this->data)) {
            $this->Post->create();
            $this->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Post->save($this->data);

            echo $this->Post->getLastInsertId();
        }
    }
    
    public function update($id = null) {
        $this->Post->id = $id;

        $this->autoRender = false;
        if($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }

        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        else if(!empty($this->data)) {
            $this->Post->save($this->data);
        }
    }

    public function remove($id = null) {
        $this->Post->id = $id;

        $this->autoRender = false;
        if($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }

        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        else {
            $this->Post->delete($id);
        }
    }

    public function get_by_workspace($id = null) {
        if(isset($this->params['requested']) and !empty($id)) {
            return $this->Post->find('all', array("fields"=> array("Post.id, Post.content, Post.position_x, Post.position_y"), 
                                                  "conditions" => array("Post.workspace_id" => $id),
                                                  )); 
        }
    }
}
