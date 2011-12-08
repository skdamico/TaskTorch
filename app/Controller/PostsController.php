<?php

class PostsController extends AppController {

    public $name = 'Posts';

    public function add() {
        $this->Post->save($this->request->data);
    }
}
