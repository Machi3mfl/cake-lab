<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Agregar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Categorias</h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
        <li><hr></li>
        <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
      </ul>
    </div>
  </div>
<div class="col-md-6 col-md-offset-3 card">
    <legend><?php echo __('Añadir nueva Categoria'); ?></legend>
        <?php echo $this->Form->create('Categoria', array('data-toggle' => 'validator' , 'role' => 'form')); ?>
        <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <?php
                echo $this->Form->input('nombre',array(
                  'div' => false , 'class' => 'form-control' , 'required' => true , 'type' => 'text' , 'after' => '<div class="help-block with-errors"></div>'));
            ?>
        </div>
        <div class="form-group clear"></div>
        <?php echo $this->Form->submit(__('Agregar'), array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end();?>
        </div>
      </div>
</div>
