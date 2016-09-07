<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <h3><?php echo __('Actions'); ?></h3>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Crear Superficie'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Crear Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-8">
	<h2><?php echo __('Superficies'); ?></h2>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
    <thead>
  	<tr>
  			<th><?php echo $this->Paginator->sort('id'); ?></th>
  			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
  			<th class="actions"><?php echo __('Acciones'); ?></th>
  	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($superficies as $superficie): ?>
	<tr>
		<td><?php echo h($superficie['Superficie']['id']); ?>&nbsp;</td>
		<td><?php echo h($superficie['Superficie']['tipo']); ?>&nbsp;</td>
                <td>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $superficie['Superficie']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $superficie['Superficie']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'),
                            __('Are you sure you want to delete # %s?', $superficie['Superficie']['id'])
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
