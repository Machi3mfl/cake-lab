<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Ver Lista' , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
      <li><?php echo $this->Html->link(__('Editar Lista'), array('action' => 'edit', $lista['Lista']['id'])); ?> </li>
      <li><?php echo $this->Form->postLink(__('Borrar Lista'), array('action' => 'delete', $lista['Lista']['id']), null, __('Are you sure you want to delete # %s?', $lista['Lista']['id'])); ?> </li>
      <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('Crear Lista'), array('action' => 'add')); ?> </li>
    </ul>
</div>

<div class="col-md-8">
    <div class="row">
    <legend>
        <h3><?php  echo __('Lista de Precios'); ?></h3>
    </legend>
	  <?php echo $this->Form->input('id',array('value' => $lista['Lista']['id'] , 'type' => 'hidden')); ?>
    <blockquote>
      <h3><small><?php echo $lista['Lista']['nombre']; ?></small></h3>
        <?php echo $this->Html->link('Editar Precios', array(
          'controller' => 'listas', 'action' => 'edit', $lista['Lista']['id']),array(
              'class'=>'btn btn-warning pull-right'));
        ?>
    </blockquote>

    </div>
    <div class="row">
            <h3><?php echo __('Precios'); ?></h3>
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
              <tr>
                <td>
                    <?php echo $this->Form->input('precio_id',array('value'=>$precios['id'],'type'=>'hidden'));  ?>
                </td>
                <?php echo $this->Form->input('producto_id',array('value'=>$precios['producto_id'],'type'=>'hidden'));  ?>
                <td><?php echo $precios['productos']['Categoria']['nombre']; ?></td>
                <td><?php echo $precios['productos']['Superficie']['tipo']; ?></td>
                <td><?php echo $precios['productos']['Tamano']['tamano']; ?></td>
                <td>$ <?php echo money_format('%(#10n',$precios['precio']); ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    <?php endif; ?>
    </div>
</div>
