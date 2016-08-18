<div class="col-sm-3 col-md-2 sidebar">
    <legend><h3><?php echo __('Acciones'); ?></h3></legend>
    <ul class="nav nav-colapse">
            <li><?php echo $this->Html->link(__('Nuevo Pedido'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Copias'), array('controller' => 'copias', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nueva Copia'), array('controller' => 'copias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
    <leyend>
        <h3>Pedidos <small> > Administración</small></h3>
    </leyend>
    <div class="table-responsive">
        <table class="table table-hover">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('importe'); ?></th>
            <th><?php echo $this->Paginator->sort('cantidad'); ?></th>
            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('sucursal'); ?></th>
            <th><?php echo $this->Paginator->sort('forma_pago'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('estado'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <?php
	foreach ($pedidos as $pedido): ?>
	<tr>
		<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['importe']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedido['Cliente']["apellido"]." ".$pedido['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($pedido['Pedido']['sucursal']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['forma_pago']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['observaciones']); ?>&nbsp;</td>
    <td><?php echo h($pedido['Pedido']['estado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-success')
                                );
                        ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'),
                            __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])
                                );
                        ?>
		</td>

	</tr>
<?php endforeach; ?>
	</table>
    </div> <!-- table responsive -->
	<p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count} , comienza en el registro {:start}, finaliza en el registro {:end}')
            ));
            ?>
        </p>
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
    </div>
</div>
