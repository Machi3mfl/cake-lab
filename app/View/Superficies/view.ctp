<div class="superficies view">
<h2><?php  echo __('Superficie'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($superficie['Superficie']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Superficie'), array('action' => 'edit', $superficie['Superficie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Superficie'), array('action' => 'delete', $superficie['Superficie']['id']), null, __('Are you sure you want to delete # %s?', $superficie['Superficie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superficie'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Productos'); ?></h3>
	<?php if (!empty($superficie['productos'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th><?php echo __('Superficie Id'); ?></th>
		<th><?php echo __('Tamano Id'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($superficie['productos'] as $productos): ?>
		<tr>
			<td><?php echo $productos['id']; ?></td>
			<td><?php echo $productos['precio']; ?></td>
			<td><?php echo $productos['activo']; ?></td>
			<td><?php echo $productos['categoria_id']; ?></td>
			<td><?php echo $productos['superficie_id']; ?></td>
			<td><?php echo $productos['tamano_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $productos['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $productos['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $productos['id']), null, __('Are you sure you want to delete # %s?', $productos['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
