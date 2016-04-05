<div class="promociones view">
<h2><?php  echo __('Promocione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['max']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descuento En'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['descuento_en']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Descuento'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['tipo_descuento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descuento'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['descuento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['imagen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['min']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promocione'), array('action' => 'edit', $promocione['Promocione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promocione'), array('action' => 'delete', $promocione['Promocione']['id']), null, __('Are you sure you want to delete # %s?', $promocione['Promocione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocione'), array('action' => 'add')); ?> </li>
	</ul>
</div>
