<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Agregar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
            <li><?php echo $this->Html->link(__('Listar Estados'), array('action' => 'index')); ?></li>
            <li><hr></li>
    </ul>
</div>
<div class="col-md-9">
<?php echo $this->Form->create('Estado' , array('data-toggle' => 'validator' , 'role' => 'form')); ?>

        <legend><?php echo __('Agregar Nuevo Estado'); ?></legend>
        <div class="col-md-5">
            <div class="form-group">
                <?php
                   echo $this->Form->input('nombre',array(
                     'class'=>'form-control' , 'required' => true , 'div' => false, 'type' => 'text' ,  'after' => '<div class="help-block with-errors"></div>'));
                ?>
            </div>
            <?php echo $this->Form->end(array('label' => 'Agregar','class'=>'btn btn-primary','div' => array('class'=>'form-group') ));?>
        </div>
</div>
