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
    <!--?php echo $this->Html->css('/bootstrapValidator/css/bootstrapValidator'); ?-->
    <?php echo $this->Html->css('style'); ?>
    <!--?php echo $this->Html->css('/css/twitter/bootstrap-multiselect'); ?-->



    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Bootstrap Validator Js file -->
    <!--?php echo $this->Html->script('/bootstrapValidator/js/bootstrapValidator'); ?-->
    <!--?php echo $this->Html->script('/bootstrapValidator/js/language/es_ES'); ?-->
    <!--?php echo $this->Html->script('/js/twitter/bootstrap-multiselect'); ?-->
    <!--?php echo $this->Html->script('/js/default'); ?-->
    <script type="text/javascript">
        var base_url = "<?php echo Router::url('/');?>";
    </script>
    <style>

            @import url(http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
    .fa-fw {width: 2em;}
        </style>
        <style>

    .panel-new {
        border-color: #dfe8f1;
        background-color: #fff;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    h4.title-table {
        font-size: 15px;
    }
    .title-lead {
        color: #3f3f3f;
    }
    .title-table .title-lead {
        font-size: 65%;
        margin: 5px 0 0;
    }
    .title-table + .title-lead {
        margin-top: -10px;
    }

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
