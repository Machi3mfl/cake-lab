<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Editar Lista' , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
      <li><?php echo $this->Form->postLink(__('Borrar Lista'), array('action' => 'delete', $lista['Lista']['id']), null, __('Are you sure you want to delete # %s?', $lista['Lista']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('Crear Lista'), array('action' => 'add')); ?> </li>
    </ul>
</div>
<?php echo $this->Form->create('Precios', array('data-toggle' => 'validator' , 'role' => 'form')); ?>
<div class="col-md-8">
    <div class="row">
    <legend>
        <h3><?php  echo __('Lista de Precios'); ?></h3>
    </legend>
        <blockquote>
            <h3><small><?php echo $lista['Lista']['nombre']; ?></small></h3>
        </blockquote>
    </div>
    <div class="row">
      <h3><?php echo __('Precios'); ?></h3>
      <?php if (!empty($lista['precios'])): ?>
      <div class="table-responsive">
      <table cellpadding = "0" cellspacing = "0" class="table table-hover">
		    <tr>
		      <th><?php echo __('#'); ?></th>
		      <th><?php echo __('Categoria'); ?></th>
		      <th><?php echo __('Superficie'); ?></th>
		      <th><?php echo __('Tamaño'); ?></th>
		      <th><?php echo __('Precio'); ?></th>
		    </tr>
		    <?php
		      $i = 0;
		      foreach ($lista['precios'] as $precios):
				?>
		    <tr>
		      <td>
		          <?php echo $this->Form->input( 'Precio.'.$i.'.id',array('value'=>$precios['id'],'type'=>'hidden'));  ?>
		      </td>
		      <?php echo $this->Form->input( 'Precio.'.$i.'.producto_id',array('value'=>$precios['producto_id'],'type'=>'hidden'));  ?>
		      <td><?php echo $precios['productos']['Categoria']['nombre']; ?></td>
		      <td><?php echo $precios['productos']['Superficie']['tipo']; ?></td>
		      <td><?php echo $precios['productos']['Tamano']['tamano']; ?></td>
		      <td>
						<?php
              $precio_formateado=money_format('%(#10n',$precios['precio']);
							echo $this->Form->input('Precio.'.$i.'.precio' , array(
								'value' => $precios['precio'] , 'type' => 'number' , 'label' => false ,
								'class' => 'form-control' , 'required' => true, 'div' => 'form-group',
								'after' => '<div class="help-block with-errors"></div>'));
						?>
					</td>
		    </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      </table>
    </div>
  <?php
		endif;
		echo $this->Form->submit('Confirmar', array('class' => 'btn btn-success btn-lg pull-right' , 'div' => false));
		echo $this->Form->end();
	?>
  </div>
</div>
