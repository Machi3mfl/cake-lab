<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
?>
<div class="col-sm-3 col-md-2 sidebar">
    <legend><h3><?php echo __('Acciones'); ?></h3></legend>
    <ul class="nav nav-colapse">
      <li><?php echo $this->Html->link(__('Nuevo Pedido'), array('action' => 'add')); ?></li>
      <li><hr></li>
      <li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
    <leyend>
        <h3>Pedidos <small> > Administración</small></h3>
    </leyend>
    <div class="table-responsive">
      <table id="pedidos" class="table table-hover">
      <thead>
        <tr>
          <th><?php echo $this->Paginator->sort('id'); ?></th>
          <th><?php echo $this->Paginator->sort('fecha'); ?></th>
          <th><?php echo $this->Paginator->sort('importe'); ?></th>
          <th><?php echo $this->Paginator->sort('cantidad'); ?></th>
          <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
          <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
          <th><?php echo $this->Paginator->sort('estado'); ?></th>
          <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
      </thead>
      <tbody>
  <?php
	 foreach ($pedidos as $pedido): ?>
   <?php
     if(!function_exists('money_format')){
      $imp = number_format($pedido['Pedido']['importe'], 2);
     }else{
      $imp = money_format('%(#10n',$pedido['Pedido']['importe']);
     }
   ?>
	<tr>
		<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['fecha']); ?>&nbsp;</td>
    <td>$ <?php echo $imp; ?></td>
		<td><?php echo h($pedido['Pedido']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedido['Cliente']["apellido"]." ".$pedido['Cliente']['nombre'], array(
        'controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id']),array(
          'id' => $pedido['Cliente']['id'],
          'class' => 'clienteid'
        )); ?>
		</td>
		<td><?php echo h($pedido['Pedido']['observaciones']); ?>&nbsp;</td>
    <td><?php echo h($pedido['Estado']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-success btn-xs')
                                );
                        ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-warning btn-xs')
                            );
                        ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-danger btn-xs'),
                            __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])
                                );
                        ?>
      <?php echo $this->Html->link(__('Recibo'), array('action' => 'recibo', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-primary btn-xs recibo',
                            'value' => $pedido['Pedido']['id']
                            )
                            );
                        ?>
		</td>

	</tr>
<?php endforeach; ?>
  </tbody>
	</table>
  </div> <!-- table responsive -->
  <?php echo $this->element('pagination');?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".clienteid").on('click',function(e){
    e.preventDefault();
    var cliente = $(this).attr('id');
    $.ajax({
           type: "POST",
           url: 'clientes/view/'+cliente,
           data: ({id : cliente}),
           success: function (data, textStatus){
               $("#modal .modal-title").empty().html("Datos de cliente");
               $("#modal .modal-body").empty().html(data);
               $("#modal").modal();
           }
       });

  });

  $(".recibo").on('click',function(e){
    e.preventDefault();
    var pedido = $(this).attr('value');
    $.ajax({
           type: "POST",
           url: 'pedidos/recibo/'+pedido,
           data: ({id : pedido}),
           success: function (data, textStatus){
               $("#modal .modal-title").empty().html("Recibo de pedido");
               $("#modal .modal-body").empty().html(data);
               $("#modal").modal();
           }
       });

  });
</script>
