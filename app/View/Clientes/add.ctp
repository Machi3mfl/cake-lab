<div id="content" class="col-md-12">

  <div id="header" class="row">
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle btn-rotate" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="ti-settings"></i> Acciones
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?></li>
      </ul>
    </div>
  </div>
<script>
    $(document).ready(function(){
        $('.form-group').append('<div class="help-block with-errors"></div>');
    })
</script>
<div class="col-md-10 col-md-offset-1">
        <legend><h5><?php echo __('Agregando nuevo Cliente'); ?></h5></legend>
        <div class='col-md-10 col-md-offset-1 card'>
            <legend>
                <h4>Cliente: <small> Dar de alta al cliente </small></h4>
            </legend>
            <?php echo $this->Form->create('Cliente',["data-toggle"=>"validator","role"=>"form"]); ?>
            <div class="form-group col-md-12">
              <label>Nombre</label>
            </div>
            <div class='col-md-6 form-group'>
                <?php   echo $this->Form->input('apellido',array(
                  'class'=>'form-control col-md-12','placeHolder'=>'Ingrese Apellido','required'=>true, 'label' => false, 'div' => false)); ?>
            </div>
            <div class='col-md-6 form-group'>
                <?php  echo $this->Form->input('nombre',array(
                  'class'=>'form-control col-md-12','placeHolder'=>'Ingrese Nombre','required'=>true, 'label' => false , 'div' => false)); ?>
            </div>

            <div class="form-group col-md-12">
              <label>Sexo</label>
            </div>
            <div class='form-group col-md-7'>
                <?php   echo $this->Form->select('sexo',array('Masculino' => 'Masculino','Femenino' => 'Femenino'),array('class'=>'form-control','required'=>true) ); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Domicilio</label>
            </div>
            <div class='form-group col-md-5'>
                <?php   echo $this->Form->input('calle',array('class'=>'form-control','placeHolder'=>'Ingrese Calle','label'=>false,'required'=>true)); ?>
            </div>
            <div class='form-group col-md-4'>
                <?php   echo $this->Form->input('numero',array('class'=>'form-control','placeHolder'=>'Ingrese Altura','label'=>false, 'required'=>true , 'type'=>'number')); ?>
            </div>
            <div class='form-group col-md-3'>
                <?php   echo $this->Form->input('piso',array('class'=>'form-control','placeHolder'=>'Departamento / Piso','label'=>false, 'required'=>true, 'type'=>'text')); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Código Postal</label>
            </div>
            <div class='form-group col-md-8'>
                <?php  echo $this->Form->input('codigo_postal',array('class'=>
                  'form-control','placeHolder'=>'Ingrese codigo postal','required'=>true, 'label' => false , 'div' => false )); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Teléfono</label>
            </div>
            <div class='form-group col-md-8'>
                <?php echo $this->Form->input('telefono',array(
                  'class'=>'form-control','placeHolder'=>'Ingrese número de telefono','required'=>true , 'div' => false, 'label' => false)); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Provincia</label>
            </div>
            <div class='form-group col-md-8'>
                <?php   echo $this->Form->select('provincia',$provincias,array(
                  'class'=>'form-control','required'=>true, 'div' => false , 'label' => false )); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Localidad</label>
            </div>
            <div class='form-group col-md-8'>
              <select id="ClienteLocalidad" required="1" class="form-control" name="data[Cliente][localidad]">
                <option value=""></option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label>Email</label>
            </div>
            <div class='form-group col-md-8'>
                <?php  echo $this->Form->input('User.email',array(
                  'class'=>'form-control','placeHolder'=>'Ingrese correo electronico','type'=>'email', 'required'=>true, 'div' => false , 'label' => false )); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Contraseña</label>
            </div>
            <div class='form-group col-md-12'>
                <?php   echo $this->Form->input('User.password',array(
                  'class'=>'form-control','placeHolder'=>'Ingrese contraseña','required'=>true , 'div' => false, 'label' => false )); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Confirmar Contraseña</label>
            </div>
            <div class='form-group col-md-12'>
                <?php   echo $this->Form->input('User.password2',array(
                  'class'=>'form-control','placeHolder'=>'Ingrese contraseña','type'=>'password','required'=>true,'data-match'=>"#UserPassword" ,
                  'div' => false , 'label' => false)); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Grupo</label>
            </div>
            <div class="form-group col-md-8">
                <?php  echo $this->Form->input('User.group_id',array(
                  'class'=>'form-control' , 'div' => false, 'label' => false), array(
                    'div'=>'clearfix',
                    'after'=>'</div>','label'=>false, 'class'=>'xlarge','required'=>true)); ?>
            </div>
            <div class="form-group col-md-12">
              <label>Lista de precios</label>
            </div>
            <div class="form-group col-md-8">
                <?php    echo $this->Form->input('lista_id',array(
                  'class'=>'form-control', 'div' => false , 'label' => false), array(
                    'div'=>'clearfix',
                    'after'=>'</div>','label'=>false, 'class'=>'xlarge','required'=>true )); ?>
            </div>
            <div class='form-group col-md-8'>
                <?php   echo $this->Form->input('User.status',array('class'=>'form-control','checked'=>true), array('div'=>'clearfix',
                    'before'=>'<div class="form-group"><label>'.__('Activado').'</label><div class="input"></div>',
                    'after'=>'</div>','label'=>false));
                ?>
            </div>
            <div class="row col-md-12">
              <?php echo $this->Html->link(__('Cancelar'), array('controller' => 'clientes', 'action' => 'index'),array(
                'class' => 'btn btn-danger pull-left'
              )); ?>
              <?php echo $this->Form->end(array('label' => 'Agregar Cliente','class'=>'btn btn-success pull-right','div' => false));?>
            </div>
        </div>
  </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
  $("#ClienteProvincia").change(function(){
    var prov = $(this).val();
    $.ajax({
  		async: true,
  		method: "post",
  		url: '<?php echo $this->Html->url(array('action' => 'updateLocalidad')); ?>',
  		data: {prov:  prov}
  	}).done(function(respuesta){
      $('#ClienteLocalidad').html(respuesta);
  	});
  });
});
</script>
