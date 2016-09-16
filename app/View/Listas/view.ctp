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
        <li><?php echo $this->Html->link(__('Editar Lista'), array('action' => 'edit', $lista['Lista']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Borrar Lista'), array('action' => 'delete', $lista['Lista']['id']), null, __('Are you sure you want to delete # %s?', $lista['Lista']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Crear Lista'), array('action' => 'add')); ?> </li>
      </ul>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2 card">
      <div class="row">
      <legend>
          <h5><?php  echo 'Lista "'.$lista['Lista']['nombre'].'"'; ?></h5>
      </legend>
  	  <?php echo $this->Form->input('id',array('value' => $lista['Lista']['id'] , 'type' => 'hidden')); ?>
      <?php echo $this->Html->link('Editar Precios', array(
        'controller' => 'listas', 'action' => 'edit', $lista['Lista']['id']),array(
            'class'=>'btn btn-warning pull-right'));
      ?>
      </div>
      <div class="row">
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
                foreach ($lista['precios'] as $precios): ?>
                <?php
                  if(!function_exists('money_format')){
                   $precio = number_format($precios['precio'], 2);
                  }else{
                   $precio = money_format('%(#10n',$precios['precio']);
                  }
                ?>
                <tr>
                  <td>
                      <?php echo $this->Form->input('precio_id',array('value'=>$precios['id'],'type'=>'hidden'));  ?>
                  </td>
                  <?php echo $this->Form->input('producto_id',array('value'=>$precios['producto_id'],'type'=>'hidden'));  ?>
                  <td><?php echo $precios['productos']['Categoria']['nombre']; ?></td>
                  <td><?php echo $precios['productos']['Superficie']['tipo']; ?></td>
                  <td><?php echo $precios['productos']['Tamano']['tamano']; ?></td>
                  <td>$ <?php echo $precio; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      <?php endif; ?>
      </div>
  </div>
</div>
