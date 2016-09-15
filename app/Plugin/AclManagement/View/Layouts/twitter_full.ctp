<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>Laboratorio</title>
    <meta name="description" content="Laboratorio">
    <meta name="author" content="Machi3mfl">
	  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <!--?php echo $this->Html->css('dataTables.bootstrap.min'); ?-->
    <!-- Latest compiled and minified CSS -s->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">
    <!        __________PAPER STYLE___________ --->
    <!--  Paper Dashboard core CSS    -->
    <?php echo $this->Html->css('/css/paper/paper-dashboard.css') ?>
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <?php echo $this->Html->css('/css/paper/themify-icons.css') ?>
    <?php echo $this->Html->css('style'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!--?= $this->Html->script('/js/paper/jquery-1.10.2.js') ?-->
    <?= $this->Html->script('/js/paper/jquery-ui.min.js') ?>
    <?= $this->Html->script('/js/validator.js') ?>

    <script type="text/javascript">
        var base_url = "<?php echo Router::url('/');?>";
    </script>
    <style>
        @import url(http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
        .fa-fw {width: 2em;}
    </style>
</head>
<body>
<div class="wrapper">
    <?php echo $this->element('sidebar', array(), array('plugin' => 'AclManagement'));?>
  <div class="main-panel">
    <?php echo $this->element('navbar', array(), array('plugin' => 'AclManagement'));?>
    <div class="content">
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
      </div>
    </div>
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center"></h3>
      </div>
      <div class="modal-body col-md-12">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Volver</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--   Core JS Files   -->
</body>

<?= $this->Html->script('/js/paper/bootstrap.min.js') ?>
<?php echo $this->Html->script('bootstrap-filestyle'); ?>
<?= $this->Html->script('/js/paper/paper-dashboard.js') ?>
<!--  Charts Plugin -->
<?= $this->Html->script('/js/paper/chartist.min.js') ?>
<!--  Notifications Plugin    -->
<?= $this->Html->script('/js/paper/bootstrap-notify.js') ?>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<?= $this->Html->script('/js/paper/moment.js') ?>
<!--  Date Time Picker Plugin is included in this js file -->
<?= $this->Html->script('/js/paper/bootstrap-datetimepicker.js') ?>
<!--  Select Picker Plugin -->
<?= $this->Html->script('/js/paper/bootstrap-selectpicker.js') ?>
<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<?= $this->Html->script('/js/paper/bootstrap-checkbox-radio-switch-tags.js') ?>
<!-- Circle Percentage-chart -->
<?= $this->Html->script('/js/paper/jquery.easypiechart.min.js') ?>
<?= $this->Html->script('/js/paper/bootstrap-notify.js') ?>
<!-- Sweet Alert 2 plugin -->
<?= $this->Html->script('/js/paper/sweetalert2.js') ?>
<!-- Vector Map plugin -->
<?= $this->Html->script('/js/paper/jquery-jvectormap.js') ?>
<!-- Wizard Plugin    -->
<?= $this->Html->script('/js/paper/jquery.bootstrap.wizard.min.js') ?>
<!--  Datatable Plugin    -->
<?= $this->Html->script('/js/paper/bootstrap-table.js') ?>
<!--  Full Calendar Plugin    -->
<?= $this->Html->script('/js/paper/fullcalendar.min.js') ?>
<!--   Sharrre Library    -->
<?= $this->Html->script('/js/paper/jquery.sharrre.js') ?>
<!--  Forms Validations Plugin -->

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/locale/bootstrap-table-es-AR.js"></script>

<?php echo $this->Html->script('validator'); ?>

</html>
