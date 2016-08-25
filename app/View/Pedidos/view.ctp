<style>
img{
	cursor:pointer !important;
}
</style>
<div class="col-md-2 sidebar">
	<legend><h3><?php echo __('Acciones'); ?></h3></legend>
		<ul class="nav nav-colapse">
			<li><?php echo $this->Html->link(__('Editar Pedido'), array('action' => 'edit', $pedido['Pedido']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Borrar Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), null, __('Are you sure you want to delete # %s?', $pedido['Pedido']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Listar Pedidos'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Crear nuevo Pedido'), array('action' => 'add')); ?> </li>
			<li><hr></li>
			<li><?php echo $this->Html->link(__('Listar Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Agregar nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<div class="col-md-10">
		<h3><?php  echo __('Pedido'); ?></h3>
		<div class="table-responsive">
			<table class="table table-hover">
			<thead>
			<tr>
				<th><?php echo __('#'); ?></th>
				<th><?php echo __('Fecha'); ?></th>
				<th><?php echo __('Importe'); ?></th>
				<th><?php echo __('Cantidad'); ?></th>
				<th><?php echo __('Cliente'); ?></th>
				<th style="display:none;"><?php echo __('Sucursal'); ?></th>
				<th style="display:none;"><?php echo __('Forma Pago'); ?></th>
				<th><?php echo __('Estado'); ?></th>
				<th><?php echo __('Observaciones'); ?></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?php echo h($pedido['Pedido']['id']); ?>&nbsp;</td>
				<td><?php echo h($pedido['Pedido']['fecha']); ?>&nbsp;</td>
				<td><?php echo h($pedido['Pedido']['importe']); ?>&nbsp;</td>
				<td><?php echo h($pedido['Pedido']['cantidad']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($pedido['Cliente']['apellido']." ".$pedido['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>	&nbsp;</td>
				<td style="display:none;"><?php echo h($pedido['Pedido']['sucursal']); ?>&nbsp;</td>
				<td style="display:none;"><?php echo h($pedido['Pedido']['forma_pago']); ?>&nbsp;</td>
				<td><?php echo h($pedido['Estado']['nombre']); ?>&nbsp;</td>
				<td><?php echo h($pedido['Pedido']['observaciones']); ?>&nbsp;</td>
			</tr>
			</tbody>
		</table>
		</div><!--- FIN TABLE RESPONSIVE --------->
		<h3><?php echo __('Copias del pedido'); ?></h3>
	<?php if (!empty($pedido['Copia'])): ?>
	<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<tr>
			<th><?php echo __('#'); ?></th>
			<th><?php echo __('Miniatura'); ?></th>
			<th><?php echo __('Nombre'); ?></th>
			<th><?php echo __('Categoria'); ?></th>
			<th><?php echo __('Superficie'); ?></th>
			<th><?php echo __('Tamaño'); ?></th>
			<th><?php echo __('Cantidad'); ?></th>
			<th><?php echo __('Borde'); ?></th>
			<th><?php echo __('Precio'); ?></th>
			<th style="display:none;"><?php echo __('Pedido Id'); ?></th>
			<th style="display:none;"><?php echo __('Upload Id'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($pedido['Copia'] as $index => $copia): ?>
		<tr>
			<td><?php echo $copia['id']; ?></td>
			<td>
			<?php if(isset($uploads)): ?>
				<?php echo $this->Html->image('../files/thumbs/'.$uploads[$index]['Upload']['photo_dir'].'/thumb_'.$uploads[$index]['Upload']['photo'],
									array('id'=>'imageresource'.$index ,"class"=>'miniatura', 'alt' => $uploads[$index]['Upload']['photo']) ); ?>
			<?php endif; ?>
			</td>
			<td>
				<?php echo $uploads[$index]['Upload']['photo']; ?>
			</td>
			<td>
				<?php echo $copia['Producto']['Categoria']['nombre']; ?>
			</td>
			<td>
				<?php echo $copia['Producto']['Superficie']['tipo']; ?>
			</td>
			<td>
				<?php echo $copia['Producto']['Tamano']['tamano']; ?>
			</td>
			<td><?php echo $copia['cantidad']; ?></td>
			<td>
				<?php
					if( $copia['borde'] == '0')
						echo 'No';
					else
						echo 'No';
				?>
			</td>
			<td><?php echo $copia['precio']; ?></td>
			<td style="display:none;"><?php echo $copia['pedido_id']; ?></td>
			<td style="display:none;">
				<?php echo $this->Html->link($copia['producto_id'], array('controller' => 'productos', 'action' => 'view', $copia['producto_id'])); ?>	&nbsp;
			</td>
			<td style="display:none;"><?php echo $copia['upload_id']; ?></td>
			<td style="display:none;">
			<?php echo $this->Html->link(__('Ver'), array('controller'=> 'copias','action' => 'view', $copia['id']),array(
														'type'=>'button',
														'class'=>'btn btn-success')
																);
												?>
			<?php echo $this->Html->link(__('Editar'), array('controller'=> 'copias','action' => 'edit', $copia['id']),array(
														'type'=>'button',
														'class'=>'btn btn-warning')
														);
												?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('controller'=> 'copias','action' => 'delete', $copia['id']),array(
														'type'=>'button',
														'class'=>'btn btn-danger'),
														__('Are you sure you want to delete # %s?', $copia['id'])
																);
												?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div> <!--- FIN DE TABLE RESPONSIVE ----------------->
<?php endif; ?>
<!-- Img Modal -->
<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
				<img style="max-width:100%;" alt="" class="" src="">
      </div>
    </div>
  </div>
</div>

</div>
<script>
$(".miniatura").bind("click",function(event){
	var url=$(this).attr('src');
	url=url.replace('/thumbs/','/pedidos/');
	link=url.replace('thumb_','');
	var nombre=$(this).attr('alt');
	asignarImagen(link,nombre);
	$('#imgModal').modal('show');
});

function asignarImagen(url,nombre){
	$("#imgModal .modal-title").text(nombre);
	$("#imgModal img").attr('src',url);
}
</script>
