<?php

class Workspace extends AppModel {
    public $name = 'Workspace';

    public $hasMany = array('Post');
    public $hasAndBelongsToMany = 'User';
}
