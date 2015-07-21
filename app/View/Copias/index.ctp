<div class="col-md-2">
    <h3><?php echo __('Actions'); ?></h3>
    <ul  class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('New Copia'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-8">
	<h2><?php echo __('Copias'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('borde'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th><?php echo $this->Paginator->sort('pedido_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('producto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('upload_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($copias as $copia): ?>
	<tr>
		<td><?php echo h($copia['Copia']['id']); ?>&nbsp;</td>
		<td><?php echo h($copia['Copia']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($copia['Copia']['borde']); ?>&nbsp;</td>
		<td><?php echo h($copia['Copia']['precio']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($copia['Pedido']['id'], array('controller' => 'pedidos', 'action' => 'view', $copia['Pedido']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($copia['Producto']['id'], array('controller' => 'productos', 'action' => 'view', $copia['Producto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($copia['Upload']['name'], array('controller' => 'uploads', 'action' => 'view', $copia['Upload']['id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $copia['Copia']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-success')
                                );
                        ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $copia['Copia']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            ); 
                        ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $copia['Copia']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'), 
                            __('Are you sure you want to delete # %s?', $copia['Copia']['id'])
                                ); 
                        ?>
		</td>



	</tr>
<?php endforeach; ?>
	</table>
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
<div class="actions">
</div>
