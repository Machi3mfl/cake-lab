<div class="copias view">
<h2><?php  echo __('Copia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($copia['Copia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($copia['Copia']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Borde'); ?></dt>
		<dd>
			<?php echo h($copia['Copia']['borde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($copia['Copia']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pedido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($copia['Pedido']['id'], array('controller' => 'pedidos', 'action' => 'view', $copia['Pedido']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($copia['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $copia['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upload'); ?></dt>
		<dd>
			<?php echo $this->Html->link($copia['Upload']['name'], array('controller' => 'uploads', 'action' => 'view', $copia['Upload']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Copia'), array('action' => 'edit', $copia['Copia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Copia'), array('action' => 'delete', $copia['Copia']['id']), null, __('Are you sure you want to delete # %s?', $copia['Copia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Copias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Copia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
