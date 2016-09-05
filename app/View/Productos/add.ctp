<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Agregar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
    <h3><?php echo __('Acciones'); ?></h3>
    </legend>
	  <ul class="nav nav-sidebar">
    	<li><?php echo $this->Html->link(__('Listar Productos'), array('action' => 'index')); ?></li>
      <li><hr></li>
    	<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
    	<li><?php echo $this->Html->link(__('Crear Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
      <li><hr></li>
    	<li><?php echo $this->Html->link(__('Listar Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
    	<li><?php echo $this->Html->link(__('Crear Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
      <li><hr></li>
    	<li><?php echo $this->Html->link(__('Listar Tamaños'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
    	<li><?php echo $this->Html->link(__('Crear Tamaño'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
	   </ul>
</div>
<div class="col-md-10">
<?php echo $this->Form->create('Producto', array( "data-toggle" => "validator", "role" =>"form" , 'inputDefaults' => array('error' => false))); ?>
        <legend>
            <h3><?php echo __('Agregando nuevo Producto'); ?></h3>
        </legend>
    <div class="col-md-6">
        <div class='form-group'>
            <?php	echo $this->Form->input('categoria_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='form-group'>
            <?php	echo $this->Form->input('superficie_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='form-group'>
	         <?php	echo $this->Form->input('tamano_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='checkbox form-group'>
        <?php  echo $this->Form->input('activo',array('class'=>'form-control' , 'default' => 1)); ?>
	     </div>
        <div class="form-group clear"></div>
        <?php echo $this->Form->end(array('label' => 'Agregar Producto','class'=>'btn btn-primary','div' => array('class'=>'form-group') ));?>
    </div>
</div>
