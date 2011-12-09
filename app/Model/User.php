<?php 
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $name = 'User';

    public $hasMany = array('Post');
    public $hasAndBelongsToMany = 'Workspace';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
                
            )
        ),
        'email' => 'email'
    );

    public function beforeSave() {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
}
