<?php $this->Html->script(array('jquery', 'jquery-ui', 'workspace'), array( 'inline' => false, 'once' => true )); ?>
<?php $this->Html->css(array('flick/jquery-ui', 'styles.workspace'), null, array( 'inline' => false, 'once' => true )); ?>

<?php $posts = $this->requestAction('posts/get_by_workspace/'. $workspace_id); ?>

<div id='workspace-container'>
    <div class='workspace-tools'>
        <div class='post tool'>
            <div class='content'>
                <div class='display'></div>
                <div class='char-count'></div>
            </div>
            <ul class='options' style='display: none;'>
                <li id='edit'>
                    <span class='option-icon ui-icon ui-icon-pencil'></span>
                    <span class='option-text'>Edit</span>
                </li>
                <li id='color'>
                    <span class='option-icon ui-icon ui-icon-copy'></span>
                    <span class='option-text'>Color</span>
                </li>
                <li id='delete'>
                    <span class='option-icon ui-icon ui-icon-trash'></span>
                    <span class='option-text'>Delete</span>
                </li>
            </ul>
        </div>
        <div class='trash tool'>
            <div class='lid'></div>
            <div class='body'></div>
        </div>
    </div>
    <div class='workspace-content'>
        <?php foreach( $posts as $post ): ?>
            <div class='post item' data-id='<?php echo $post['Post']['id']; ?>' 
                  style='position: absolute; top: <?php echo $post['Post']['position_y']; ?>px; left: <?php echo $post['Post']['position_x']; ?>px'>
                <div class='content'>
                    <div class='display'><?php echo $post['Post']['content']; ?></div>
                    <div class='char-count'></div>
                </div>
                <ul class='options'>
                    <li id='edit'>
                        <span class='option-icon ui-icon ui-icon-pencil'></span>
                        <span class='option-text'>Edit</span>
                    </li>
                    <li id='color'>
                        <span class='option-icon ui-icon ui-icon-copy'></span>
                        <span class='option-text'>Color</span>
                    </li>
                    <li id='delete'>
                        <span class='option-icon ui-icon ui-icon-trash'></span>
                        <span class='option-text'>Delete</span>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
    <div class='clear'></div>
</div>
