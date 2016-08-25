<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-colapse">
            <li><?php echo $this->Html->link(__('Listar Estados'), array('action' => 'index')); ?></li>
            <li><hr></li>
    </ul>
</div>
<div class="col-md-9">
<?php echo $this->Form->create('Estado'); ?>

        <legend><?php echo __('Editar Estado'); ?></legend>
        <div class="col-md-5">
            <div class="form-group">
                <?php
                        echo $this->Form->input('nombre',array('class'=>'form-control'));
                ?>
            </div>
            <?php echo $this->Form->end(array('label' => 'Editar','class'=>'btn btn-primary','div' => array('class'=>'form-group') ));?>
        </div>
</div>
