<div class="uploads view">
<h2><?php  echo __('Upload'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo Dir'); ?></dt>
		<dd>
			<?php echo h($upload['Upload']['photo_dir']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Upload'), array('action' => 'edit', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Upload'), array('action' => 'delete', $upload['Upload']['id']), null, __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Copias'), array('controller' => 'copias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Copia'), array('controller' => 'copias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Copias'); ?></h3>
	<?php if (!empty($upload['Copia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Borde'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Pedido Id'); ?></th>
		<th><?php echo __('Producto Id'); ?></th>
		<th><?php echo __('Upload Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($upload['Copia'] as $copia): ?>
		<tr>
			<td><?php echo $copia['id']; ?></td>
			<td><?php echo $copia['cantidad']; ?></td>
			<td><?php echo $copia['borde']; ?></td>
			<td><?php echo $copia['precio']; ?></td>
			<td><?php echo $copia['pedido_id']; ?></td>
			<td><?php echo $copia['producto_id']; ?></td>
			<td><?php echo $copia['upload_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'copias', 'action' => 'view', $copia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'copias', 'action' => 'edit', $copia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'copias', 'action' => 'delete', $copia['id']), null, __('Are you sure you want to delete # %s?', $copia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Copia'), array('controller' => 'copias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
