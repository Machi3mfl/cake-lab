<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
        <li><?php echo $this->Html->link(__('Ver Listas'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Precios'), array('controller' => 'precios', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Precios'), array('controller' => 'precios', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-9">

    <legend>
        <h3><?php echo __('Agregar Lista'); ?></h3>
    </legend>
    <div class="col-md-8">
        <?php echo $this->Form->create('Lista',array('class'=>'form-inline')); ?>
        <div class="form-group">
            <?php echo $this->Form->input('nombre',array('class'=>'form-control','label'=>'Nombre'.' ','placeHolder'=>'Ingrese nombre')); ?>
        </div>
        <div class="form-group">
        <?php echo $this->Form->submit('Agregar',array('class'=>'btn btn-info')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
