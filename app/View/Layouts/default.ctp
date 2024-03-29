<?php echo $this->Html->docType('xhtml-trans'); ?>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>TaskTorch - <?php echo $title_for_layout; ?></title>
    <?php 
        echo $this->Html->meta('icon');
        
        echo $this->Html->css('styles'); 

        echo $scripts_for_layout;
    ?>
</head>
<body>
    <div id='container'>
        <div id='header'>
            <h1><?php echo $this->Html->link("TaskTorch", "/"); ?></h1>
            <div id='header-link-bar'>
                <span><?php echo $this->Html->link("My Account", "/users/view"); ?></span> |
                <?php if(isset($user_logged_in) && !empty($user_logged_in)): ?>
                <span><?php echo $this->Html->link("Logout", "/users/logout"); ?></span> |
                <?php endif; ?>
                <span><?php echo $this->Html->link("About", "/about"); ?></span> |
                <span><?php echo $this->Html->link("Help", "/help"); ?></span>
            </div>
        </div>
        <div id='content'>
            <?php echo $this->Session->flash(); ?>
            <?php echo $content_for_layout; ?>
        </div>
        <div id='footer'>
         
        </div>
    </div>
</body>
</html>
