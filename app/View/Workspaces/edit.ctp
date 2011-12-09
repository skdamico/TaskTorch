<h2><?php echo $workspace['Workspace']['name']; ?></h2>
<p>
   <?php echo $this->element('workspace', array("workspace_id" => $workspace['Workspace']['id'])); ?>
</p>
<div><small>Created on: <?php echo $workspace['Workspace']['created']; ?></small></div>


<input id='workspace-id' type='hidden' value='<?php echo $workspace['Workspace']['id']; ?>' />
<input id='user-id' type='hidden' value='<?php echo $user_logged_in['id']; ?>' />
