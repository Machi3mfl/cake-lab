<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Producto <br><small> Listado de productos disponibles</small></h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
    		<li><?php echo $this->Html->link(__('Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
    		<li><?php echo $this->Html->link(__('Tamaños'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
        <li><hr></li>
        <li><?php echo $this->Html->link(__('Crear Producto'), array('action' => 'add')); ?></li>
      </ul>
    </div>
  </div>
<div class="col-md-10 col-md-offset-1">
    <div class="table-responsive card">
  	<table  id="bootstrap-table" data-toggle="table" data-sort-name="id" data-sort-orde="desc"  data-search="true"
   data-show-toggle="true" data-show-columns="true" class="table table-no-bordered">
    <thead>
  	<tr>
  			<th data-field="id"><?php echo 'Id'; ?></th>
  			<th><?php echo 'Categoria'; ?></th>
  			<th><?php echo 'Superficie'; ?></th>
  			<th><?php echo 'Tamaño'; ?></th>
        <th><?php echo 'Activo'; ?></th>
  			<th class="actions"><?php echo __('Actions'); ?></th>
  	</tr>
    </thead>
    <tbody>
  	<?php
  	foreach ($productos as $producto): ?>
  	<tr>
  		<td><?php echo h($producto['Producto']['id']); ?></td>
  		<td><?php echo h($producto['Categoria']['nombre']); ?></td>
  		<td><?php echo h($producto['Superficie']['tipo']); ?></td>
  		<td><?php echo h($producto['Tamano']['tamano']); ?></td>
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
</div>
</div>
