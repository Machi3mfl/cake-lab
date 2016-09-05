<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
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
        <table id="bootstrap-table" data-toggle="table" data-sort-name="id" data-sort-orde="desc"  data-search="true"
       data-show-toggle="true" data-show-columns="true" class="table table-no-bordered">
        <thead>
	      <tr>
          <th data-field="id"><?php echo 'Id'; ?></th>
          <th data-field="nombre"><?php echo 'Nombre'; ?></th>
          <th data-field="calle"><?php echo 'Calle'; ?></th>
          <th data-field="numero"><?php echo 'Numero'; ?></th>
          <th data-field="telefono"><?php echo 'Telefono'; ?></th>
          <th data-field="provincia"><?php echo 'Provincia'; ?></th>
          <th data-field="localidad"><?php echo 'Localidad'; ?></th>
          <th data-field="email"><?php echo 'Email'; ?></th>
          <th data-field="lista"><?php echo 'Lista'; ?></th>
          <th class="actions"><?php echo __('Acciones'); ?></th>
	       </tr>
        </thead>
        <tbody>
	<?php
	foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nombre'].' '.$cliente['Cliente']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['calle']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['numero']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($provincias[$cliente['Cliente']['provincia']]); ?>&nbsp;</td>
		<td><?php echo h($localidades[$cliente['Cliente']['localidad']]); ?>&nbsp;</td>
		<td><?php echo h($cliente['User']['email']); ?>&nbsp;</td>
    <td><?php echo h($cliente['Lista']['nombre']); ?>&nbsp;</td>
		<td>
      <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cliente['Cliente']['id']),array(
          'type'=>'button',
          'class'=>'btn btn-success btn-xs')
              );
      ?>
      <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cliente['Cliente']['id']),array(
          'type'=>'button',
          'class'=>'btn btn-warning btn-xs')
          );
      ?>
      <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $cliente['Cliente']['id']),array(
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
</div>
<script>
$(document).ready(function(){
});
$.extend($.fn.bootstrapTable.columnDefaults, {
  	sortable: true,
});

$(function() {
  $table = $('#bootstrap-table').bootstrapTable();
});

</script>
