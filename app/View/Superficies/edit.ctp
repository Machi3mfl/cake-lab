<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
        <li><?php echo $this->Html->link(__('Listar Superficies'), array('action' => 'index')); ?></li>
        <li><hr></li>
        <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>    
</div>
<div class="col-md-9">
    <legend><?php echo __('Editar Superficie'); ?></legend>
        <?php echo $this->Form->create('Superficie'); ?>
        <div class="col-md-5">
        <div class="form-group">
            <?php
                echo $this->Form->input('tipo',array('class'=>'form-control'));
            ?>
        </div>
        <div class="form-group clear"></div>
        
        <?php echo $this->Form->submit(__('Editar'), array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end();?>
        </div>
</div>