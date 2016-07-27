<div class="col-md-2">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul class="nav nav-sidebar">
            <li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script>
    $(document).ready(function(){
        $('.form-group').append('<div class="help-block with-errors"></div>');
    })
</script>

<div class="col-md-8">
        <legend><?php echo __('Agregando nuevo Cliente'); ?></legend>
            <blockquote>
              <p>Para dar de alta un nuevo cliente debera crear primero un usuario. Dicho usuario le servira para poder ingresar al sistema y generar pedidos</p>
            </blockquote>
        
        <div class='col-md-6'>
            <legend>
                <h3>Cliente: <small> Dar de alta al cliente </small></h3>
            </legend>
            <?php echo $this->Form->create('Cliente',["data-toggle"=>"validator","role"=>"form"]); ?>
            <div class='form-group'>
                <?php  echo $this->Form->input('nombre',array('class'=>'form-control','placeHolder'=>'Ingrese Nombre','required'=>true)); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('apellido',array('class'=>'form-control','placeHolder'=>'Ingrese Apellido','required'=>true)); ?>
            </div>
            <div class='form-group'>
                <label class='control-label' for='ClienteSexo'>Sexo
                <?php   echo $this->Form->select('sexo',array('Masculino','Femenino'),array('class'=>'form-control','required'=>true) ); ?>
                </label>
            </div>
            <label class='control-label'>Domicilio</label>
            <div class='form-group'> 
                <?php   echo $this->Form->input('calle',array('class'=>'form-control','placeHolder'=>'Ingrese Calle','label'=>false,'required'=>true)); ?>
            </div>
            <div class='form-group'>  
                <?php   echo $this->Form->input('numero',array('class'=>'form-control','placeHolder'=>'Ingrese Altura','label'=>false,'required'=>true,'type'=>'number')); ?>
            </div>
            <label class='control-label'>Departamento/Piso</label>
            <div class='form-group'>
                <?php   echo $this->Form->input('piso',array('class'=>'form-control','placeHolder'=>'Ingrese Departamento o piso','label'=>false,'required'=>true,'type'=>'number')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('telefono',array('class'=>'form-control','placeHolder'=>'Ingrese número de telefono','required'=>true)); ?>
            </div>            
            <div class='form-group'>
                <label class='control-label' for='ClienteProvincia'>Provincia
                <?php   echo $this->Form->select('provincia',$provincias,array('class'=>'form-control','required'=>true)); ?>
                </label>
            </div>
            <div class='form-group'>
                <label class='control-label' for='ClienteLocalidad'>Localidad
                <?php   echo $this->Form->select('localidad',$localidades,array('class'=>'form-control','required'=>true)); ?>
                </label>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('codigo_postal',array('class'=>'form-control','placeHolder'=>'Ingrese codigo postal','required'=>true)); ?>
            </div>
            <div class='form-group'>
                <?php  echo $this->Form->input('User.email',array('class'=>'form-control','placeHolder'=>'Ingrese correo electronico','type'=>'email', 'required'=>true)); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.password',array('class'=>'form-control','placeHolder'=>'Ingrese contraseña','required'=>true  )); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.password2',array('class'=>'form-control','placeHolder'=>'Ingrese contraseña','type'=>'password','required'=>true)); ?>
            </div>
            <div class="form-group">
                <?php    echo $this->Form->input('User.group_id',array('class'=>'form-control'), array('div'=>'clearfix',
                'after'=>'</div>','label'=>false, 'class'=>'xlarge','required'=>true)); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.status',array('class'=>'form-control','checked'=>true), array('div'=>'clearfix', 
                    'before'=>'<div class="form-group"><label>'.__('Activado').'</label><div class="input"></div>',
                    'after'=>'</div>','label'=>false, 'class'=>''));
                ?>
            </div>                
            <?php echo $this->Form->end(array('label' => 'Agregar Cliente','class'=>'btn btn-primary','div' => array('class'=>'form-group') ));?>
        </div>
        
</div>
<!--script type="text/javascript">
$( document ).ready(function() {
    $.ajax({
        async:true, 
        type:'post', 
        complete:function(request, json) {
            $('#ClienteLocalidades').html(request.responseText); 
        }, 
        url:'/Clientes/updateSelect', 
        data:$('#ClienteProvincias').serialize()
    }); 
});     
</script-->