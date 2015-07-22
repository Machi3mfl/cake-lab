<div class="col-md-2">
    <h3><?php echo __('Actions'); ?></h3>
	<ul class="nav nav-sidebar">
		<li><?php echo $this->Html->link(__('New Tamano'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-8">
	<h2><?php echo __('Tamanos'); ?></h2>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tamano'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tamanos as $tamano): ?>
	<tr>
		<td><?php echo h($tamano['Tamano']['id']); ?>&nbsp;</td>
		<td><?php echo h($tamano['Tamano']['tamano']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tamano['Tamano']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-success')
                                );
                        ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tamano['Tamano']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            ); 
                        ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tamano['Tamano']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'), 
                            __('Are you sure you want to delete # %s?', $tamano['Tamano']['id'])
                                ); 
                        ?>
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