<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
	<ul class="nav nav-sidebar">
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('action' => 'add')); ?></li>
		<li><hr></li>
    <li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><hr></li>
		<li><?php echo $this->Html->link(__('Listar Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
		<li><hr></li>
		<li><?php echo $this->Html->link(__('Listar Tamaños'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tamaño'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-10">
        <h3><?php echo __('Productos '); ?><small> > Listado de productos</small></h3>
        <div class="table-responsive">
	<table cellpadding="0" cellspacing="0"  class="table table-hover">
  <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('superficie_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tamano_id','Tamaño'); ?></th>
      <th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
  </thead>
  <tbody>
	<?php
	foreach ($productos as $producto): ?>
	<tr>
		<td><?php echo h($producto['Producto']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($producto['Superficie']['tipo'], array('controller' => 'superficies', 'action' => 'view', $producto['Superficie']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($producto['Tamano']['tamano'], array('controller' => 'tamanos', 'action' => 'view', $producto['Tamano']['id'])); ?>
		</td>
    <td>
      <?php
          if($producto['Producto']['activo'] == 1): ?>
          <span style="color : green;" aria-hidden="true" class="glyphicon glyphicon-ok"></span>
      <?php
          else : ?>
          <span style="color : #d43f3a;" aria-hidden="true" class="glyphicon glyphicon-remove"></span>
      <?php
          endif; ?>
    </td>
		<td>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $producto['Producto']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning  btn-xs')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $producto['Producto']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger  btn-xs'),
                            __('Are you sure you want to delete # %s?', $producto['Producto']['id'])
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
