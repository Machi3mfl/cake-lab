<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-8">
	<h2><?php echo __('Categorias'); ?></h2>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	<thead>
	<tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nombre'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categorias as $categoria): ?>
	<tr>
		<td><?php echo h($categoria['Categoria']['id']); ?>&nbsp;</td>
		<td><?php echo h($categoria['Categoria']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $categoria['Categoria']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $categoria['Categoria']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'),
                            __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])
                                );
                        ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
  </div>
  <?php echo $this->element('pagination');?>
</div>
