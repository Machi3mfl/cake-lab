<div class="tamanos view">
<h2><?php  echo __('Tamano'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tamano['Tamano']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tamano'); ?></dt>
		<dd>
			<?php echo h($tamano['Tamano']['tamano']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tamano'), array('action' => 'edit', $tamano['Tamano']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tamano'), array('action' => 'delete', $tamano['Tamano']['id']), null, __('Are you sure you want to delete # %s?', $tamano['Tamano']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tamanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tamano'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Productos'); ?></h3>
	<?php if (!empty($tamano['Producto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Papel Id'); ?></th>
		<th><?php echo __('Tamano Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tamano['Producto'] as $producto): ?>
		<tr>
			<td><?php echo $producto['id']; ?></td>
			<td><?php echo $producto['precio']; ?></td>
			<td><?php echo $producto['activo']; ?></td>
			<td><?php echo $producto['categoria_id']; ?></td>
			<td><?php echo $producto['papel_id']; ?></td>
			<td><?php echo $producto['tamano_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $producto['id']), null, __('Are you sure you want to delete # %s?', $producto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
