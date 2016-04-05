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
    <?php echo $this->Html->css('style'); ?>
    
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Bootstrap Validator Js file -->
    <?php echo $this->Html->script('/bootstrapValidator/js/bootstrapValidator'); ?>
    <?php echo $this->Html->script('/bootstrapValidator/js/language/es_ES'); ?>
    
    
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		//echo $this->Html->script('jquery/jquery-1.7.1.min');
		//echo $this->AssetCompress->script('jquery-combined');
                
		echo $scripts_for_layout;
                echo $this->Js->writeBuffer(array('cache'=>TRUE));
	?>	
    <!--style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 90%; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span16,
      .content .span7,
      .content .span7,
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span7,
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style-->

  </head>

  <body>
    <?php echo $this->element('topbar', array(), array('plugin' => 'AclManagement'));?>
<div class="container-fluid">

        <div class="row">
            <div class="span14">
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
        </div>
      </div>

    <footer>
        <!-- AGREGAR FOOTER
        
        p><a href="mailto:vukhanhtruong@gmail.com">vukhanhtruong@gmail.com</a> &copy; 2015</p-->
    </footer>
</div> <!-- /container -->
</body>
<script>
$('.dropdown-toggle').dropdown();
</script>
</html>
