<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>Laboratorio</title>
    <meta name="description" content="Laboratorio">
    <meta name="author" content="Machi3mfl">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <?php echo $this->Html->script('bootstrap-filestyle'); ?>
    <!--?php echo $this->Html->script('jquery.dataTables.min'); ?-->

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!--?php echo $this->Html->css('jquery.dataTables.min'); ?-->
    <?php echo $this->Html->css('style'); ?>

    <script type="text/javascript">
        var base_url = "<?php echo Router::url('/');?>";
    </script>
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
</div> <!-- /container -->
<footer class="footer">
      <div class="container">
        <p class="text-muted">Laboratorio.</p>
      </div>
</footer>
<?php echo $this->Html->script('validator'); ?>
    <script>
    $(document).ready(function(){
        //Handles menu drop down
        $('.dropdown-menu').find('form').click(function (e) {
            e.stopPropagation();
        });
    });
    </script>

</body>


</html>
