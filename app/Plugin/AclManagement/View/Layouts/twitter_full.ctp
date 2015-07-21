<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>Laboratorio</title>
    <meta name="description" content="Laboratorio">
    <meta name="author" content="Machi3mfl">
    <!-- Jquery v 2.1.3
         Jquery UI v 1.11.2
         Bootstrap v 3.3.2
         JqueryFileUpload - CakePHP v 0.1
         Bootstrap Validator v 5.2.0
    -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Validator CSS file -->
    <?php echo $this->Html->css('/bootstrapValidator/css/bootstrapValidator'); ?>

    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    
    <!-- Bootstrap Validator Js file -->
    <?php echo $this->Html->script('/bootstrapValidator/js/bootstrapValidator'); ?>
    <?php echo $this->Html->script('/bootstrapValidator/js/language/es_ES'); ?>

  	<?php
		echo $this->Html->meta('icon');
		echo $scripts_for_layout;
	?>	
    
    <style>
        
        @import url(http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
.fa-fw {width: 2em;}
    </style>
</head>
<body>
    <?php echo $this->element('navbar-admin', array(), array('plugin' => 'AclManagement'));?>
<div class="container-fluid">
                <?php if(isset($title)){?>
                <div class="page-header">
                    <h1><?php echo $title; ?> <small><?php if(isset($description)) echo $description;?></small></h1>
                </div>
                    <?php } ?>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                <div class="row">
                    <?php echo $content_for_layout; ?>
                </div>
    <footer>
        <!-- AGREGAR FOOTER
        
        p><a href="mailto:vukhanhtruong@gmail.com">vukhanhtruong@gmail.com</a> &copy; 2015</p-->
    </footer>
</div> <!-- /container -->
</body>
<script>
$(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});</script>

</html>
