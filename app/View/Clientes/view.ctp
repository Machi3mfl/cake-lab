<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Ver '.$this->name , '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul class="nav nav-sidebar">
			<li><?php echo $this->Html->link(__('Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Borrar Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), null, __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Agregar Cliente'), array('action' => 'add')); ?> </li>
		</ul>
</div>
<div id="content" class="col-md-10">
<legend><h3><?php  echo __('Cliente'); ?></h3></legend>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nombre_completo']); ?>
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['sexo']); ?>
		</dd>
		<dt><?php echo __('Calle'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['calle']); ?>
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['numero']); ?>
		</dd>
		<dt><?php echo __('Piso'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['piso']); ?>
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['telefono']); ?>
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($provincia[$cliente['Cliente']['provincia']]); ?>
		</dd>
		<dt><?php echo __('Localidad'); ?></dt>
		<dd>
			<?php echo h($localidad[$cliente['Cliente']['localidad']]); ?>
		</dd>
		<dt><?php echo __('Codigo Postal'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['codigo_postal']); ?>
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($cliente['User']['email']); ?>
		</dd>
		<dt><?php echo __('Lista de Precios'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cliente['Lista']['nombre'], array('controller' => 'users', 'action' => 'view', $cliente['Lista']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
