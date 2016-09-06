<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Nueva Lista'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Precios'), array('controller' => 'precios', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevos Precios'), array('controller' => 'precios', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
	<h3><?php echo __('Listas de precios'); ?></h3>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
  <thead>
  	<tr>
  			<th><?php echo $this->Paginator->sort('id'); ?></th>
  			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
  			<th class="actions"><?php echo __('Acciones'); ?></th>
  	</tr>
  </thead>
  <tbody>
	<?php
	foreach ($listas as $lista): ?>
	<tr>
            <td><?php echo h($lista['Lista']['id']); ?>&nbsp;</td>
            <td><?php echo h($lista['Lista']['nombre']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $lista['Lista']['id']),array(
                        'type'=>'button',
                        'class'=>'btn btn-success')
                            );
                    ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-warning')
                    );
                ?>
                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-danger'),
                    __('Are you sure you want to delete # %s?', $lista['Lista']['id'])
                        );
                ?>
                <?php echo $this->Html->link(__('Editar Nombre'), array('action' => 'editarNombre', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-primary')
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
