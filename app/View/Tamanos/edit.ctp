<div class="tamanos form">
<?php echo $this->Form->create('Tamano'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tamano'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tamano');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tamano.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tamano.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tamanos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
