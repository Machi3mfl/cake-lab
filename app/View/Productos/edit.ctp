<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Editar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
    <h3><?php echo __('Acciones'); ?></h3>
    </legend>
	  <ul class="nav nav-sidebar">
      <li><?php echo $this->Form->postLink(__('Borrar Producto'), array('action' => 'delete', $this->Form->value('Producto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Producto.id'))); ?></li>
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
<div class="col-md-6">
<?php echo $this->Form->create('Producto'); ?>
	<fieldset>
		<legend><h3><?php echo __('Editar Producto'); ?></h3></legend>
	<?php
		echo $this->Form->input('id' , array('class' => 'form-control'));
		echo $this->Form->input('categoria_id' , array('class' => 'form-control'));
		echo $this->Form->input('superficie_id' , array('class' => 'form-control'));
		echo $this->Form->input('tamano_id' , array('class' => 'form-control'));
    echo $this->Form->input('activo' , array('class' => 'form-control'));
	?>
	</fieldset>
  <?php echo $this->Html->link(__('Cancelar'), array('controller' => 'productos', 'action' => 'index'),array(
    'class' => 'btn btn-danger pull-left'
  )); ?>
<?php echo $this->Form->submit('Editar', array('class' => 'btn btn-primary pull-right')); ?>
<?php echo $this->Form->end(); ?>
</div>
