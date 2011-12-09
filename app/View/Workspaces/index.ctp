<?php $this->Html->script(array('jquery', 'jquery-ui', 'addworkspace'), array( 'inline' => false, 'once' => true )); ?>
<?php $this->Html->css(array('flick/jquery-ui', 'styles.workspaces'), null, array( 'inline' => false, 'once' => true )); ?>

<h2>Workspaces</h2>
<div class='workspaces-container'>
    <ul class="workspaces">
        <li style='display:none;'>
            <a class='workspace' href=''>
                <span class='label'></span>
                <span class='view'></span>
            </a>
        </li>
        <?php foreach($workspaces as $workspace): ?>
        <li>
            <a class='workspace' href='/stickyspaces/workspaces/edit/<?php echo $workspace['Workspace']['id']; ?>'>
                <span class='label'><?php echo $workspace['Workspace']['name']; ?></span>
                <span class='view'></span>
            </a>
        </li>
        <?php endforeach; ?>
        <li>
            <a class='add-workspace' href='#add'>Add New</a>
        </li>
    </ul>
</div>

<div id="workspace-dialog" title="Add Workspace" style='display: none'>
    <form>
        <label for='name'>Name</label>
        <input type='text' id='name' value='' />
    </form>
</div>
