<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Editar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
        <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?></li>
        <li><hr></li>
        <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-9">
    <legend><?php echo __('Editar Superficie'); ?></legend>
        <?php echo $this->Form->create('Lista', array('data-toggle' => 'validator' , 'role' => 'form')); ?>
        <div class="col-md-5">
        <div class="form-group">
            <?php
                echo $this->Form->input('nombre',array('class'=>'form-control', 'value' => $lista['Lista']['nombre'], 'required' => true , 'div' => 'form-group',
                'after' => '<div class="help-block with-errors"></div>'));
            ?>
        </div>
        <div class="form-group clear"></div>
        <?php echo $this->Html->link(__('Cancelar'), array('controller' => 'listas', 'action' => 'index'),array(
          'class' => 'btn btn-danger pull-left'
        )); ?>
        <?php echo $this->Form->submit(__('Editar'), array('class' => 'btn btn-primary pull-right')); ?>
        <?php echo $this->Form->end();?>
        </div>
</div>
