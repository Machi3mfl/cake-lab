<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h3>Precios</h3>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Form->postLink(__('Borrar Lista'), array('action' => 'delete', $lista['Lista']['id']), null, __('Are you sure you want to delete # %s?', $lista['Lista']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Crear Lista'), array('action' => 'add')); ?> </li>
      </ul>
    </div>
  </div>
<?php echo $this->Form->create('Precios', array('data-toggle' => 'validator' , 'role' => 'form')); ?>
<div class="col-md-8 col-md-offset-2 card">
    <div class="row">
      <legend>
          <h5><?php  echo 'Lista "'.$lista['Lista']['nombre'].'"'; ?></h5>
      </legend>
  	  <?php echo $this->Form->input('id',array('value' => $lista['Lista']['id'] , 'type' => 'hidden')); ?>
      <?php echo $this->Form->button('Actualizar Lista', array(
        'class'=>'btn btn-success pull-right',
        'id' => 'actualizarProds',
        'type' => 'button'));
      ?>
    </div>
    <div id="lista-precios" class="row">
      <?php if (!empty($lista['precios'])): ?>
      <div class="table-responsive">
      <table cellpadding = "0" cellspacing = "0" class="table table-hover">
      <thead>
		    <tr>
		      <th><?php echo __('#'); ?></th>
		      <th><?php echo __('Categoria'); ?></th>
		      <th><?php echo __('Superficie'); ?></th>
		      <th><?php echo __('Tamaño'); ?></th>
		      <th><?php echo __('Precio'); ?></th>
		    </tr>
      </thead>
      <tbody>
		    <?php
		      $i = 0;
		      foreach ($lista['precios'] as $precios):
				?>
        <?php
          if(!function_exists('money_format')){
           $precio = number_format($precios['precio'], 2);
          }else{
           $precio = money_format('%(#10n',$precios['precio']);
          }
        ?>
		    <tr>
		      <td>
              <?php echo $this->Form->input( 'Precio.'.$i.'.lista_id',array('value'=>$lista['Lista']['id'],'type'=>'hidden'));  ?>
		          <?php echo $this->Form->input( 'Precio.'.$i.'.id',array('value'=>$precios['id'],'type'=>'hidden'));  ?>
		      </td>
		      <?php echo $this->Form->input( 'Precio.'.$i.'.producto_id',array('value'=>$precios['producto_id'],'type'=>'hidden'));  ?>
		      <td><?php echo $precios['productos']['Categoria']['nombre']; ?></td>
		      <td><?php echo $precios['productos']['Superficie']['tipo']; ?></td>
		      <td><?php echo $precios['productos']['Tamano']['tamano']; ?></td>
		      <td>
						<?php
							echo $this->Form->input('Precio.'.$i.'.precio' , array(
								'value' => $precio  , 'label' => false ,
								'class' => 'form-control' , 'required' => true, 'div' => 'form-group',
								'after' => '<div class="help-block with-errors"></div>'));
						?>
					</td>
		    </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
      </table>
    </div>
  </div>
  <?php
    endif;
    echo $this->Form->submit('Confirmar', array('class' => 'btn btn-success btn-lg pull-right' , 'div' => false));
    echo $this->Form->end();
  ?>
</div>
  </div>
<script type="text/javascript">
  $("#actualizarProds").on('click',function(e){
    var id = $("#Precio0ListaId").val();
	  $.ajax({
	    method: "POST",
	    url: "../../productos/getProductos",
      data: { lista_id : id }
    })
	  .done(function( data ) {
			$("#lista-precios").html(data);

	  });
    $('#PreciosEditForm').validator('update');
  });

</script>
