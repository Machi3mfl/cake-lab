<div class="promociones index">
	<h2><?php echo __('Promociones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('max'); ?></th>
			<th><?php echo $this->Paginator->sort('descuento_en'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_descuento'); ?></th>
			<th><?php echo $this->Paginator->sort('descuento'); ?></th>
			<th><?php echo $this->Paginator->sort('imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('min'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($promociones as $promocione): ?>
	<tr>
		<td><?php echo h($promocione['Promocione']['id']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['max']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['descuento_en']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['tipo_descuento']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['descuento']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['imagen']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($promocione['Promocione']['min']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promocione['Promocione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promocione['Promocione']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promocione['Promocione']['id']), null, __('Are you sure you want to delete # %s?', $promocione['Promocione']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promocione'), array('action' => 'add')); ?></li>
	</ul>
</div>
