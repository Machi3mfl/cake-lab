<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Clientes <br><small> Listado de clientes</small></h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Crear Nuevo Cliente'), array('action' => 'add')); ?></li>
      </ul>
    </div>
  </div>
<div class="col-md-12">
    <div class="table-responsive card">
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
    <td>
      <?php
       echo $this->Html->link(
            $cliente['Lista']['nombre'],'javascript:void(0)',array(
              'class' => 'verlista' , 'value' => $cliente['Lista']['id']));
      ?>
    </td>
		<td>
      <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cliente['Cliente']['id']),array(
          'type'=>'button',
          'class'=>'btn btn-success btn-xs v')
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
<script type="text/javascript">

$('#bootstrap-table').on('click-cell.bs.table', function (e , field, value, row, $element){
  var lista = $element.children().attr('value');
  if (field == 'lista'){
    $.ajax({
      type: "POST",
      url: "<?php echo $this->Html->url('/', true).'listas/view/' ?>"+lista,
      data: ({id : lista}),
      success: function (data, textStatus){
         $("#modal .modal-title").empty().html("Lista de Precio");
         $("#modal .modal-body").empty().html(data);
         $("#modal .modal-body .col-md-2").hide();
         $("#modal").modal();
      }
    });
  }
});

</script>
