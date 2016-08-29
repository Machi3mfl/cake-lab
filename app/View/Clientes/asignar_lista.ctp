<?php
  $this->Html->addCrumb( $this->name , '/'.$this->params['controller'] , array('class' => 'btn btn-default'));
  $this->Html->addCrumb( 'Asignar Lista ', '/'.$this->params['controller'].'/'.$this->params['action'] , array('class' => 'btn btn-default'));
?>
<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Nuevo Cliente'), array('action' => 'add')); ?></li>
            <li><hr></li>
            <li><?php echo $this->Html->link(__('Ver Listas'), array('controller' => 'listas', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nueva Lista'), array('controller' => 'listas', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-10">
    <h3><?php echo __('Clientes'); ?><small> > Asignando Lista de precios</small></h3>
    <?php echo $this->Form->create('Cliente'); ?>
    <div class="table-responsive">
    <table id="clientes" class="table table-hover">
      <thead>
        <tr>
          <th>#</th><th>Nombre</th><th>Email</th><th>Lista</th><th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if (isset($clientes)) :
          foreach($clientes as $index => $cliente):
          ?>
          <tr>
            <td>
              <?php echo $this->Form->input( $index.'.id', array('value' => $cliente['Cliente']['id'] , 'type' => 'hidden' )); ?>
            </td>
            <td>
              <?php echo $cliente['Cliente']['apellido'].' '.$cliente['Cliente']['nombre']; ?>
            </td>
            <td>
              <?php echo $cliente['User']['email']; ?>
            </td>
            <td>
              <?php echo $this->Form->input( $index.'.lista_id', array(
                'options' => $listas, 'label' => false, 'class' => 'form-control' , 'default' => $cliente['Cliente']['lista_id'])); ?>
            </td>
            <td>
              <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $cliente['Cliente']['id']),array(
                  'type'=>'button',
                  'class'=>'btn btn-success')
                  );
              ?>
            </td>
          </tr>
        <?php
          endforeach;
        endif;
      ?>
      </tbody>
    </table>
    </div>
    <div style="margin-top:2%;"class="row">
      <?php echo $this->Html->link(__('Cancelar'), array('action' => 'index'),array(
          'type'=>'button',
          'class'=>'btn btn-danger')
          );
      ?>
      <?php echo $this->Form->end(array(
          'label' => 'Editar Cliente','class'=>'btn btn-primary','div' => array('class'=>'form-group pull-right') ));
      ?>
    </div>
</div>
<script>
  $(document).ready(function(){
    var table = $('#clientes').DataTable( {
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
      },
      "bLengthChange": false
    });
  });
</script>
