<?php if(empty($user['id'])): ?>
    <h2>No user found</h2>
<?php else: ?>
    <h2><?php echo $user['username']; ?></h2>

    <h3><?php echo $user['email']; ?></h3>

    <?php if(isset($own_acct)): ?>
        <?php echo $this->Html->link('Edit account', array('action' => 'edit', $user['id'])); ?>
    <?php endif; ?>
<?php endif; ?>
