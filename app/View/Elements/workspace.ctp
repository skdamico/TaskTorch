<?php $this->Html->script(array('jquery', 'jquery-ui', 'workspace'), array( 'inline' => false )); ?>
<?php $this->Html->css(array('flick/jquery-ui', 'styles.workspace'), null, array( 'inline' => false )); ?>

<?php $posts = $this->requestAction('posts/get_by_workspace/'. $workspace_id); ?>

<div id='workspace-container'>
    <div class='workspace-tools'>
        <div class='post tool'><p class='content'></p></div>
        <div class='trash tool'>
            <div class='lid'></div>
            <div class='body'></div>
        </div>
    </div>
    <div class='workspace-content'>
        <?php foreach( $posts as $post ): ?>
            <div class='post item' data-id='<?php echo $post['Post']['id']; ?>' 
                  style='position: absolute; top: <?php echo $post['Post']['position_y']; ?>px; left: <?php echo $post['Post']['position_x']; ?>px'>
                <p class='content'><?php echo $post['Post']['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class='clear'></div>
</div>
