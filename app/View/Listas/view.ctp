<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Edit Lista'), array('action' => 'edit', $lista['Lista']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Lista'), array('action' => 'delete', $lista['Lista']['id']), null, __('Are you sure you want to delete # %s?', $lista['Lista']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Listas'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Lista'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Precios'), array('controller' => 'precios', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Precios'), array('controller' => 'precios', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="col-md-8">
    <div class="row">
    <legend>
        <h3><?php  echo __('Lista de Precios'); ?></h3>
    </legend>
	
	<?php echo $this->Form->input('id',array('value'=>$lista['Lista']['id'],'type'=>'hidden')); ?>
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
                    <th class="actions"><?php echo __('Acciones'); ?></th>
            </tr>
            <?php
                    $i = 0;
                    foreach ($lista['precios'] as $precios): ?>
                    <tr>
                            <td>
                                <?php echo $this->Form->input('precio_id',array('value'=>$precios['id'],'type'=>'hidden'));  ?>
                            </td>
                            <?php echo $this->Form->input('producto_id',array('value'=>$precios['producto_id'],'type'=>'hidden'));  ?>
                            <td><?php echo $productos[$i]['Categoria']['nombre']; ?></td>
                            <td><?php echo $productos[$i]['Superficie']['tipo']; ?></td>
                            <td><?php echo $productos[$i]['Tamano']['tamano']; ?></td>
                            <td><?php echo $precios['precio']; ?></td>
                            <td class="actions">
                                    <?php echo $this->Html->link('Editar', array('controller' => 'precios', 'action' => 'edit', $precios['id']),array('class'=>'btn btn-warning')); ?>
                            </td>
                    </tr>
                    <?php $i++; ?>
            <?php endforeach; ?>
            </table>
            </div>
    <?php endif; ?>
    </div>
</div>