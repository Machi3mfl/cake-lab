<?php   echo $this->Form->create('Upload',
  array('type' => 'file',
  'class'=>'form-inline',
  'url' => array(
    'controller' => 'pedidos',
    'action' => $this->action)
  )
); ?>
<div class="form-group">
  <?php   echo $this->Form->input('Upload.photo.', array('type' => 'file', 'multiple'=>true)); ?>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-success" action="">
      <span class="glyphicon glyphicon-plus"></span> Agregar fotos
  </button>
</div>
  <?php   echo $this->Form->end(); ?>

<!--- SEGUNDO FORM --------------------->

<?php echo $this->Form->create('Upload.photo.',array('type' => 'file','class'=>'form-inline','url' => array('controller' => 'pedidos', 'action' => 'guardar'))); ?>
  <div class="form-group">
    <button type="submit" class="btn btn-success" action="">
        <span class="glyphicon glyphicon-plus"></span> Guardar
    </button>
  </div>
  <?php   echo $this->Form->end(); ?>
<div id="respuesta"></div>
<script>
$(document).ready(function (){
  console.log("documento ready");
})
</script>