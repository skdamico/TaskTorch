<h2>Workspaces</h2>
<ul class="workspaces-container">
    <?php foreach($workspaces as $workspace): ?>
    <li>
        <?php echo $this->Html->link($workspace['Workspace']['name'], 
                            array('action'=>'edit', $workspace['Workspace']['id'])); ?>
    </li>
    <?php endforeach; ?>
</ul>
