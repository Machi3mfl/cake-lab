<style>
img{
	cursor:pointer !important;
}
</style>
<div id="content" class="col-md-12">
	<legend>
	<div id="header" class="row">
		<div class="dropdown">
	    <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	      <i class="ti-settings"></i> Acciones
	      <span class="caret"></span>
	    </button>
	    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><?php echo $this->Html->link(__('Editar Pedido'), array('action' => 'edit', $pedido['Pedido']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Borrar Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), null, __('¿Está seguro que desea borrar el pedido # %s?', $pedido['Pedido']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('Listar Pedidos'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Crear nuevo Pedido'), array('action' => 'add')); ?> </li>
				<li><hr></li>
				<li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Agregar nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	    </ul>
		</div>
	</div>
	</legend>
  <div id="botones" class="col-md-12 col-md-offset-1">
    <?php echo $this->Html->link(__('Volver'), array('controller' => 'pedidos', 'action' => 'index'),array(
      'class' => 'btn btn-danger pull-left'));
      echo $this->Html->link(__('Descargar'), array('action' => 'recibo_pdf', 'ext' => 'pdf', $pedido['Pedido']['id']),array(
        'class' => 'btn btn-primary pull-right'
      ));
    ?>
  </div>
  <div id="recibo" class="col-md-8 col-md-offset-2">
    <legend class="text-center"><h3>Recibo Número #<?php echo $pedido['Pedido']['id']; ?></h3></legend>
    <div id="info-clientes">
      <dl class="dl-horizontal">
        <dt>Nombre </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['nombre_completo']; ?></dd>
        <dt>Dirección </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['direccion'].' Piso/Dpto '.$pedido['Cliente']['piso']; ?></dd>
        <dd><?php echo $provincia[$pedido['Cliente']['provincia']].' '.$localidad[$pedido['Cliente']['localidad']]; ?></dd>
        <dt>Código Postal </dt><dd><?php echo $pedido['Cliente']['codigo_postal']; ?></dd>
        <dt>Télefono </dt><dd><?php echo $pedido['Cliente']['telefono']; ?></dd>
      </dl>
    </div>
    <div id="info-observaciones">
      <h4>Observaciones</h4><p><?php echo $pedido['Pedido']['observaciones']; ?></p>
    </div>
    <div id="info-productos">
      <legend class="text-center"><h3>Productos</h3></legend>
      <table class="table">
        <thead>
          <tr>
            <th colspan="4">Detalles</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($copias as $copia) : ?>
          <?php
            if(!function_exists('money_format')){
              $precio = number_format($copia['Copia']['precio'], 2);
              $subtotal = $precio * $copia['Copia']['cantidad'];
              $subtotal = number_format($subtotal, 2);
              $imp = number_format($pedido['Pedido']['importe'], 2);
            }else{
              $precio = money_format('%(#10n',$copia['Copia']['precio']);
              $subtotal = $precio * $copia['Copia']['cantidad'];
              $subtotal = money_format('%(#10n',$subtotal);
              $imp = money_format('%(#10n',$pedido['Pedido']['importe']);
            }
          ?>
          <tr>
            <td><?php echo $copia['Copia']['cantidad'] ?></td>
            <td>
              <?php
                echo $categorias[$copia['Producto']['categoria_id']].' '.$superficies[$copia['Producto']['superficie_id']].' '.$tamanos[$copia['Producto']['tamano_id']];
              ?>
            </td>
            <td><small>$ <?php echo $precio; ?></small></td>
            <td>$ <?php echo $subtotal; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td><?php echo $pedido['Pedido']['cantidad']; ?></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>$ <?php echo $imp; ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
