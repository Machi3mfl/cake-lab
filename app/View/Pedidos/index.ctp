<div class="col-md-12">
    <legend>
        <h4>Pedidos <br><small> Listado de pedidos</small></h4>
    </legend>
    <div class="table-responsive card">
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
          'value' => $pedido['Cliente']['id'],
          'class' => 'clienteid'
        )); ?>
		</td>
		<td><?php echo h($pedido['Pedido']['observaciones']); ?>&nbsp;</td>
    <td><?php echo h($pedido['Estado']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'ti-camera')), array(
        'action' => 'view', $pedido['Pedido']['id']),array(
            'type'=>'button',
            'class'=>'btn btn-simple btn-info btn-icon table-action view',
            'escape' => false));
                        ?>
			<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'ti-pencil-alt')), array(
        'action' => 'edit', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-simple btn-warning btn-icon edit',
                            'escape' => false)
                            );
                        ?>
			<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'ti-trash')), array(
        'action' => 'delete', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-simple btn-danger btn-icon remove',
                            'escape' => false),
                            __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])
                                );
                        ?>
      <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'ti-printer')), array(
        'action' => 'recibo', $pedido['Pedido']['id']),array(
                            'type'=>'button',
                            'class'=>'btn btn-simple btn-success btn-icon recibo',
                            'value' => $pedido['Pedido']['id'],
                            'escape' => false
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
    var cliente = $(this).attr('value');
    $.ajax({
           type: "POST",
           url: 'clientes/view/'+cliente,
           data: ({id : cliente}),
           success: function (data, textStatus){
               $("#modal .modal-title").empty().html("Datos de cliente");
               $("#modal .modal-body").empty().html(data);
               $("#modal .modal-body .col-md-2").hide();
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
               $("#modal .modal-body .col-md-2").hide();
               $("#modal").modal();
           }
       });

  });
</script>
