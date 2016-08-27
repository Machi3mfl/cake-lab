<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Nuevo Precio'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Ver Listas'), array('controller' => 'listas', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nueva Lista'), array('controller' => 'listas', 'action' => 'add')); ?> </li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
	<h3><?php echo __('Precios'); ?></h3>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	<tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('lista'); ?></th>
            <th><?php echo $this->Paginator->sort('id_producto'); ?></th>
            <th><?php echo $this->Paginator->sort('precio'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($precios as $precio): ?>
	<tr>
		<td><?php echo h($precio['Precio']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($precio['lista']['nombre'], array('controller' => 'listas', 'action' => 'view', $precio['lista']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($precio['productos']['id'], array('controller' => 'productos', 'action' => 'view', $precio['productos']['id'])); ?>
		</td>
                <td><?php echo h($precio['Precio']['precio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $precio['Precio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $precio['Precio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $precio['Precio']['id']), null, __('Are you sure you want to delete # %s?', $precio['Precio']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
        </div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
