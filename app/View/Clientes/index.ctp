<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Nuevo Cliente'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Usuario'), array('controller' => 'admin/users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'admin/users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
    <h3><?php echo __('Clientes '); ?><small> > Listado de clientes</small></h3>
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0"  class="table table-hover">
        <thead>
	      <tr>
          <th><?php echo $this->Paginator->sort('id'); ?></th>
          <th><?php echo $this->Paginator->sort('nombre'); ?></th>
          <th><?php echo $this->Paginator->sort('sexo'); ?></th>
          <th><?php echo $this->Paginator->sort('calle'); ?></th>
          <th><?php echo $this->Paginator->sort('numero'); ?></th>
          <th><?php echo $this->Paginator->sort('piso'); ?></th>
          <th><?php echo $this->Paginator->sort('telefono'); ?></th>
          <th><?php echo $this->Paginator->sort('provincia'); ?></th>
          <th><?php echo $this->Paginator->sort('localidad'); ?></th>
          <th><?php echo $this->Paginator->sort('codigo_postal','C.P'); ?></th>
          <th><?php echo $this->Paginator->sort('email'); ?></th>
          <th class="actions"><?php echo __('Actions'); ?></th>
	       </tr>
        </thead>
        <tbody>
	<?php
	foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nombre'].' '.$cliente['Cliente']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['sexo']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['calle']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['piso']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['provincia']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['localidad']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['codigo_postal']); ?>&nbsp;</td>
		<td><?php echo h($cliente['User']['email']); ?>&nbsp;</td>
		<td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['id']),array(
                        'type'=>'button',
                        'class'=>'btn btn-success btn-xs')
                            );
                    ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['id']),array(
                        'type'=>'button',
                        'class'=>'btn btn-warning btn-xs')
                        );
                    ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['id']),array(
                        'type'=>'button',
                        'class'=>'btn btn-danger btn-xs'),
                        __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])
                            );
                    ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
  </div>
  <?php echo $this->element('pagination');?>
</div>
