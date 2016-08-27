<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Editar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="productos form">
<?php echo $this->Form->create('Producto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Producto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('activo');
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('superficie_id');
		echo $this->Form->input('tamano_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Producto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Producto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tamanos'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tamano'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
