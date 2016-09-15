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

    <!--        __________PAPER STYLE___________ --->
    <?php echo $this->Html->css('/css/paper/bootstrap.min.css') ?>
    <!--  Paper Dashboard core CSS    -->
    <?php echo $this->Html->css('/css/paper/paper-dashboard.css') ?>
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <?php echo $this->Html->css('/css/paper/themify-icons.css') ?>
    <?php echo $this->Html->css('/css/login.css') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?= $this->Html->script('/js/paper/jquery-1.10.2.js') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!--   Core JS Files   -->

    <?= $this->Html->script('/js/paper/bootstrap.min.js') ?>
    <!--  Charts Plugin -->
    <?= $this->Html->script('/js/paper/chartist.min.js') ?>
    <!--  Notifications Plugin    -->
    <?= $this->Html->script('/js/paper/bootstrap-notify.js') ?>

    <!--  Forms Validations Plugin -->

    <?= $this->Html->script('/js/validator.js') ?>

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

<div class="wrapper">
  <div class="content">
    <div class="container-fluid">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $content_for_layout; ?>
      </div> <!-- /container -->
    </div>
  </div>
</body>
</html>
<!--script>
$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"),
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
            	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        })
    })
})
</script-->
