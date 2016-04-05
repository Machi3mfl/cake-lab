<div class="superficies form">
<?php echo $this->Form->create('Superficy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Superficy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Superficy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Superficy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
