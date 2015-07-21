<div class="col-md-2">
    <legend>
    <h3><?php echo __('Acciones'); ?></h3>
    </legend>
	<ul class="nav nav-sidebar">

		<li><?php echo $this->Html->link(__('List Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Superficies'), array('controller' => 'superficies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tamanos'), array('controller' => 'tamanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tamano'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-8">
<?php echo $this->Form->create('Producto'); ?>
        <legend>
            <h3><?php echo __('Agregando nuevo Producto'); ?></h3>
        </legend>
    <div class="col-md-8">
        <div class='form-group'>
            <?php	echo $this->Form->input('categoria_id',array('class'=>'form-control')); ?>
        </div>
        <div class='form-group'>
            <?php	echo $this->Form->input('superficie_id',array('class'=>'form-control')); ?>
        </div>
        <div class='form-group'>
	<?php	echo $this->Form->input('tamano_id',array('class'=>'form-control')); ?>
        </div>
   
        <div class='checkbox'>
        <?php   echo $this->Form->input('activo',array('class'=>'form-control')); ?>
	</div>
        
            <?php echo $this->Form->end(__('Submit')); ?>
        
    </div>
</div>

