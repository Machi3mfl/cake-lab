<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <h3><?php echo __('Actions'); ?></h3>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Agregar Nuevo Estado'), array('action' => 'add')); ?></li>
            <li><hr></li>
    </ul>
</div>
<div class="col-md-10">
	<h2><?php echo __('Estados'); ?></h2>
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
	foreach ($estados as $estado): ?>
	<tr>
		<td><?php echo h($estado['Estado']['id']); ?>&nbsp;</td>
		<td><?php echo h($estado['Estado']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $estado['Estado']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $estado['Estado']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger'),
                            __('Are you sure you want to delete # %s?', $estado['Estado']['id'])
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
