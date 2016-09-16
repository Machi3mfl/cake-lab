<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Cliente</h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
  			<li><?php echo $this->Form->postLink(__('Borrar Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
  			<li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?> </li>
  			<li><?php echo $this->Html->link(__('Agregar Cliente'), array('action' => 'add')); ?> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-6 col-md-offset-3 card">
    <legend>
        <h5>Datos del cliente</h5>
    </legend>
  	<dl class="dl-horizontal">
  		<dt><?php echo __('Id'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['id']); ?>
  		</dd>
  		<dt><?php echo __('Nombre'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['nombre_completo']); ?>
  		</dd>
  		<dt><?php echo __('Sexo'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['sexo']); ?>
  		</dd>
  		<dt><?php echo __('Calle'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['calle']); ?>
  		</dd>
  		<dt><?php echo __('Numero'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['numero']); ?>
  		</dd>
  		<dt><?php echo __('Piso'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['piso']); ?>
  		</dd>
  		<dt><?php echo __('Telefono'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['telefono']); ?>
  		</dd>
  		<dt><?php echo __('Provincia'); ?></dt>
  		<dd>
  			<?php echo h($provincia[$cliente['Cliente']['provincia']]); ?>
  		</dd>
  		<dt><?php echo __('Localidad'); ?></dt>
  		<dd>
  			<?php echo h($localidad[$cliente['Cliente']['localidad']]); ?>
  		</dd>
  		<dt><?php echo __('Codigo Postal'); ?></dt>
  		<dd>
  			<?php echo h($cliente['Cliente']['codigo_postal']); ?>
  		</dd>
  		<dt><?php echo __('Email'); ?></dt>
  		<dd>
  			<?php echo h($cliente['User']['email']); ?>
  		</dd>
  		<dt><?php echo __('Lista de Precios'); ?></dt>
  		<dd>
  			<?php echo $this->Html->link($cliente['Lista']['nombre'], array(
          'controller' => 'users', 'action' => 'view', $cliente['Lista']['id']),array(
            'class' => 'verlista',
            'value' => $cliente['Lista']['id'] ));
        ?>
  		</dd>
  	</dl>
  </div>
</div>
<script type="text/javascript">
	$(".verlista").on('click',function(e){
		e.preventDefault();
		var lista = $(this).attr('value');
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

	});
</script>
