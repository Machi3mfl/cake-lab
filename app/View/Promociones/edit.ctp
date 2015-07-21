<div class="promociones form">
<?php echo $this->Form->create('Promocione'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promocione'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('max');
		echo $this->Form->input('descuento_en');
		echo $this->Form->input('tipo_descuento');
		echo $this->Form->input('descuento');
		echo $this->Form->input('imagen');
		echo $this->Form->input('nombre');
		echo $this->Form->input('min');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promocione.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Promocione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('action' => 'index')); ?></li>
	</ul>
</div>
