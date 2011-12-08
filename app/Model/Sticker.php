<?php

class Sticker extends AppModel {
    public $name = 'Sticker';
    
    public $belongsTo = array('User', 'Workspace');
}
