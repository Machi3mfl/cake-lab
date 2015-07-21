<div class="productos view">
<h2><?php  echo __('Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Superficie'); ?></dt>
		<dd>
			<?php echo $this->Html->link($producto['Superficie']['tipo'], array('controller' => 'superficies', 'action' => 'view', $producto['Superficie']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tamano'); ?></dt>
		<dd>
			<?php echo $this->Html->link($producto['Tamano']['tamano'], array('controller' => 'tamanos', 'action' => 'view', $producto['Tamano']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Producto'), array('action' => 'edit', $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Producto'), array('action' => 'delete', $producto['Producto']['id']), null, __('Are you sure you want to delete # %s?', $producto['Producto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tamanos'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tamano'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
