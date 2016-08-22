<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
            <li><?php echo $this->Html->link(__('Listar Tamaños'), array('action' => 'index')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-9">
<?php echo $this->Form->create('Tamano' , array('data-toggle' => 'validator' , 'role' => 'form')); ?>

        <legend><?php echo __('Agregar Nuevo Tamaño'); ?></legend>
        <div class="col-md-5">
            <div class="form-group">
                <?php
                   echo $this->Form->input('tamano',array(
                     'class'=>'form-control' , 'required' => true , 'div' => false, 'type' => 'text' ,  'after' => '<div class="help-block with-errors"></div>'));
                ?>
            </div>
            <?php echo $this->Form->end(array('label' => 'Agregar','class'=>'btn btn-primary','div' => array('class'=>'form-group') ));?>
        </div>
</div>
