<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
    <?php echo __('Register'); ?>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('email');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Sign Me Up'));?>
</div>
