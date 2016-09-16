<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Precios <br><small> Lista de precios disponibles</small></h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Nueva Lista'), array('action' => 'add')); ?></li>
        <li><hr></li>
        <li><?php echo $this->Html->link(__('Listar Precios'), array('controller' => 'precios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevos Precios'), array('controller' => 'precios', 'action' => 'add')); ?> </li>
      </ul>
    </div>
<div class="col-md-8 col-md-offset-2">
  <div class="table-responsive card">
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
                        'class'=>'btn btn-success btn-xs')
                            );
                    ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-warning btn-xs')
                    );
                ?>
                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-danger btn-xs'),
                    __('Are you sure you want to delete # %s?', $lista['Lista']['id'])
                        );
                ?>
                <?php echo $this->Html->link(__('Editar Nombre'), array('action' => 'editarNombre', $lista['Lista']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-primary btn-xs')
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
</div>
