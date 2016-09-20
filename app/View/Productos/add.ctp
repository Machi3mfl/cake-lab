<div id="content" class="col-md-12">
  <div id="header" class="row">
    <legend>
        <h4>Productos</h4>
    </legend>
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Listar Productos'), array('action' => 'index')); ?></li>
        <li><hr></li>
      	<li><?php echo $this->Html->link(__('Crear Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
        <li><hr></li>
      	<li><?php echo $this->Html->link(__('Crear Superficie'), array('controller' => 'superficies', 'action' => 'add')); ?> </li>
        <li><hr></li>
      	<li><?php echo $this->Html->link(__('Crear Tamaño'), array('controller' => 'tamanos', 'action' => 'add')); ?> </li>
      </ul>
    </div>
  </div>
<div class="col-md-8 col-md-offset-2 card">
<?php echo $this->Form->create('Producto', array( "data-toggle" => "validator", "role" =>"form" , 'inputDefaults' => array('error' => false))); ?>
        <legend>
            <h5><?php echo __('Agregando nuevo Producto'); ?></h5>
        </legend>
    <div class="col-md-6 col-md-offset-3">
        <div class='form-group'>
            <?php	echo $this->Form->input('categoria_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='form-group'>
            <?php	echo $this->Form->input('superficie_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='form-group'>
	         <?php	echo $this->Form->input('tamano_id',array('class'=>'form-control','empty'=>true,'required'=>true)); ?>
        </div>
        <div class='checkbox form-group'>
        <?php  echo $this->Form->input('activo',array('class'=>'form-control' , 'default' => 1)); ?>
	     </div>
        <div class="form-group clear"></div>
        <?php echo $this->Form->end(array('label' => 'Agregar Producto','class'=>'btn btn-primary pull-right','div' => array('class'=>'form-group') ));?>
    </div>
</div>
</div>
