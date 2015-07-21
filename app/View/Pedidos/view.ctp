<div class="pedidos view">
<h2><?php  echo __('Pedido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Importe'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['importe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedido['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['sucursal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pago'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['forma_pago']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($pedido['Pedido']['observaciones']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pedido'), array('action' => 'edit', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), null, __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Copias'), array('controller' => 'copias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Copia'), array('controller' => 'copias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Copias'); ?></h3>
	<?php if (!empty($pedido['Copia'])): ?>
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
		foreach ($pedido['Copia'] as $copia): ?>
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
