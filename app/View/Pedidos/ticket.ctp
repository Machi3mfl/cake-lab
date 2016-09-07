<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Editar '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2 sidebar">
	<legend><h3><?php echo __('Acciones'); ?></h3></legend>
		<ul class="nav nav-colapse">
			<li><?php echo $this->Form->postLink(__('Borrar Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), null, __('¿Está seguro que desea borrar el pedido # %s?', $pedido['Pedido']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Ver Pedidos'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Agregar Pedido'), array('action' => 'add')); ?> </li>
			<li><hr></li>
			<li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		</ul>
	</div>
<div class="col-md-10">
  <?php //debug($copias); ?>
  <div class="row col-md-10" style="margin: 2% 0%;">
    <?php echo $this->Html->link(__('Volver'), array('controller' => 'pedidos', 'action' => 'index'),array(
      'class' => 'btn btn-danger pull-left'
    )); ?>
    <?php echo $this->Form->link('Imprimir', array('class' => 'form-group btn btn-primary pull-right')); ?>
  </div>
  <div class=" col-md-offset-1 col-md-8">
    <legend><h3>Número de pedido #<?php echo $pedido['Pedido']['id']; ?></h3></legend>
    <dl class="dl-horizontal">
      <dt>Nombre </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['nombre_completo']; ?></dd>
      <dt>Dirección </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['calle'].' '.$pedido['Cliente']['numero'].'  <strong>Piso/Dpto:</strong> '.$pedido['Cliente']['piso']; ?></dd>
      <dt>Provincia </dt><dd class="text-capitalize"><?php echo $provincia[$pedido['Cliente']['provincia']]; ?></dd>
      <dt>Localidad </dt><dd class="text-capitalize"><?php echo $localidad[$pedido['Cliente']['localidad']]; ?></dd>
      <dt>Código Postal </dt><dd><?php echo $pedido['Cliente']['codigo_postal']; ?></dd>
    </dl>
    <div class="col-md-offset-1 col-md-10">
      <legend><h4>Observaciones</h4></legend>
      <p><em><?php echo $pedido['Pedido']['observaciones'] ?></em></p>
    </div>
    <div id="ticket-prod" class="col-md-12">
      <legend><h3>Productos</h3></legend>
      <table class="table">
        <thead>
          <tr>
            <th colspan="4"><strong>Detalles</strong></th>
          </tr>
        </thead>
        <tbody>
        <?php
        $total=0;
        foreach($copias as $data) : ?>
          <tr>
            <td><?php echo $data['Copia']['cantidad']?></td>
            <td><?php echo $categorias[$data['Producto']['categoria_id']].' - '.$superficies[$data['Producto']['superficie_id']].' - '.$tamanos[$data['Producto']['tamano_id']]?></td>
            <td><small><?php echo '$ '.$data['Copia']['precio']?></small></td>
            <td><?php
              $subtotal=$data['Copia']['precio']*$data['Copia']['cantidad'];
              echo '$ '.$subtotal;
              ?>
          </tr>
          <?php $total=$total+$subtotal; ?>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td><?php echo '$ '.$total ?></td>
          </tr>
        </tfoot>
      </table>
      </div>
    </div>

</div>
