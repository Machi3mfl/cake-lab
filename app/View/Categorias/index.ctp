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
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<nav>
            <div>
                <ul class="pager">
                    <li>
                        <?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?>
                    </li>
                    <li>
                        <?php echo $this->Paginator->numbers(array('separator' => '')); ?>
                    </li>
                    <li>
                        <?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>    
                    </li>
                </ul>
            </div>
        </nav>      
</div>
