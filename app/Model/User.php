<?php 

class User extends AppModel {
    public $name = 'User';

    public $hasMany = array('Post', 'Sticker');
    public $hasAndBelongsToMany = 'Workspace';
}
