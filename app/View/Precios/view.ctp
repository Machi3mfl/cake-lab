<div class="precios view">
<h2><?php  echo __('Precio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($precio['Precio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($precio['Precio']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lista'); ?></dt>
		<dd>
			<?php echo $this->Html->link($precio['lista']['nombre'], array('controller' => 'listas', 'action' => 'view', $precio['lista']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Productos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($precio['productos']['id'], array('controller' => 'productos', 'action' => 'view', $precio['productos']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Precio'), array('action' => 'edit', $precio['Precio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Precio'), array('action' => 'delete', $precio['Precio']['id']), null, __('Are you sure you want to delete # %s?', $precio['Precio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Precios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Precio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Listas'), array('controller' => 'listas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lista'), array('controller' => 'listas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
