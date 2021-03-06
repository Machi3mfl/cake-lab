<div class="col-md-2">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul class="nav nav-sidebar">
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-9">
    <legend><?php echo __('Categoria'); ?></legend>
    <?php	echo $this->Form->create('Categoria'); ?>
    <div class="col-md-5">
	    <div class="form-group">
	        <?php
	            echo $categoria['Categoria']['id'];
	        ?>
	    </div>
			<div class="form-group">
	        <?php
	            echo $categoria['Categoria']['nombre'];
	        ?>
	    </div>
	    <div class="form-group clear"></div>
	    <?php echo $this->Form->end();?>
    </div>
    <div class="col-md-12">
		<h3><?php echo __('Productos'); ?></h3>
		<?php if (!empty($categoria['Producto'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th class="col-md-2"><?php echo __('Id'); ?></th>
				<th class="col-md-2"><?php echo __('Activo'); ?></th>
				<th class="col-md-2"><?php echo __('Categoria'); ?></th>
				<th class="col-md-2 actions">Acciones</th>
			</tr>
			<?php foreach ($categoria['Producto'] as $producto): ?>
				<tr>
					<td class="col-md-2" ><?php echo $producto['id']; ?></td>
					<td class="col-md-2" ><?php echo $producto['activo']; ?></td>
					<td class="col-md-2" ><?php echo $categoria['Categoria']['nombre']; ?></td>
					<td class="col-md-2 actions">
						<a href="<?php echo Router::url(array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>"><span class="glyphicon glyphicon-sunglasses"></span>
						</a>
						<a href="<?php echo Router::url(array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>"><span class="glyphicon glyphicon-edit"></span>
						</a>
						<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'productos', 'action' => 'delete', $producto['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $producto['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
    </div>
</div>
