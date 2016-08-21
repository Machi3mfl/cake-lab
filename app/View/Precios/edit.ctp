<div class="precios form">
<?php
	debug($listas);
 	debug($productos);
?>
<?php echo $this->Form->create('Precio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Precio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('precio');
		echo $this->Form->input('id_lista');
		echo $this->Form->input('id_producto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Precio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Precio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Precios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Listas'), array('controller' => 'listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lista'), array('controller' => 'listas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
