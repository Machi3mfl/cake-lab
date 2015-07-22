<div class="col-md-2">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="nav nav-sidebar">
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $this->data['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $this->data['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $this->data['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-9">
    <legend><?php echo __('Añadir nueva Categoria'); ?></legend>
    <?php echo $this->Form->create('Categoria'); ?>
    <div class="col-md-5">
	    <div class="form-group">
	        <?php
	            echo $this->Form->input('nombre',array('class'=>'form-control'));
	        ?>
	    </div>
	    <div class="form-group multi">
	        <?php echo $this->Form->label('Superficie', 'Superificie');?>
	        <?php
	            echo $this->Form->input('Superficie',array('label' => false, 'class'=>'form-control', 'multiple' => 'multiple'));
	        ?>
	    </div>
	    <div class="form-group clear"></div>
	    <?php echo $this->Form->end();?>
    </div>
    <div class="col-md-12">
		<h3><?php echo __('Related Productos'); ?></h3>
		<?php if (!empty($this->data['Producto'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Precio'); ?></th>
			<th><?php echo __('Activo'); ?></th>
			<th><?php echo __('Categoria Id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($this->data['Producto'] as $producto): ?>
			<tr>
				<td><?php echo $producto['id']; ?></td>
				<td><?php echo $producto['precio']; ?></td>
				<td><?php echo $producto['activo']; ?></td>
				<td><?php echo $producto['categoria_id']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $producto['id']), array(), __('Are you sure you want to delete # %s?', $producto['id'])); ?>
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
</div>
