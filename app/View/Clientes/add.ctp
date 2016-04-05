<div class="col-md-2">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul class="nav nav-sidebar">

            <li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Listar Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-8">
        <legend><?php echo __('Agregando nuevo Cliente'); ?></legend>
            <blockquote>
              <p>Para dar de alta un nuevo cliente debera crear primero un usuario. Dicho usuario le servira para poder ingresar al sistema y generar pedidos</p>
            </blockquote>
        <div class='col-md-6'>
            <legend>
                <h3>Cliente: <small> Dar de alta al cliente </small></h3>
            </legend>
            <?php echo $this->Form->create('Cliente'); ?>
            <div class='form-group'>
                <?php  echo $this->Form->input('nombre',array('class'=>'form-control','placeHolder'=>'Ingrese Nombre')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('apellido',array('class'=>'form-control','placeHolder'=>'Ingrese Apellido')); ?>
            </div>
            <div class='form-group'>
                <label class='control-label' for='ClienteSexo'>Sexo
                <?php   echo $this->Form->select('sexo',array('Masculino','Femenino'),array('class'=>'form-control')); ?>
                </label>
            </div>
            <label class='control-label'>Domicilio</label>
            <div class='form-group'> 
                <?php   echo $this->Form->input('calle',array('class'=>'form-control','placeHolder'=>'Ingrese Calle','label'=>false)); ?>
            </div>
            <div class='form-group'>  
                <?php   echo $this->Form->input('numero',array('class'=>'form-control','placeHolder'=>'Ingrese Altura','label'=>false)); ?>
            </div>
            <label class='control-label'>Departamento/Piso</label>
            <div class='form-group'>
                <?php   echo $this->Form->input('piso',array('class'=>'form-control','placeHolder'=>'Ingrese Departamento o piso','label'=>false,)); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('telefono',array('class'=>'form-control','placeHolder'=>'Ingrese número de telefono')); ?>
            </div>            
            <div class='form-group'>
                <label class='control-label' for='ClienteProvincia'>Provincia
                <?php   echo $this->Form->select('provincia',$provincias,array('class'=>'form-control')); ?>
                </label>
            </div>
            <div class='form-group'>
                <label class='control-label' for='ClienteLocalidad'>Localidad
                <?php   echo $this->Form->select('localidad',$localidades,array('class'=>'form-control')); ?>
                </label>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('codigo_postal',array('class'=>'form-control','placeHolder'=>'Ingrese codigo postal')); ?>
            </div>
            <div class='form-group'>
                <?php  echo $this->Form->input('User.email',array('class'=>'form-control','placeHolder'=>'Ingrese correo electronico')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.password',array('class'=>'form-control','placeHolder'=>'Ingrese contraseña')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.password2',array('class'=>'form-control','placeHolder'=>'Ingrese contraseña','type'=>'password')); ?>
            </div>
            <div class="form-group">
                <?php    echo $this->Form->input('User.group_id',array('class'=>'form-control'), array('div'=>'clearfix',
                'after'=>'</div>','label'=>false, 'class'=>'xlarge')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('User.status',array('class'=>'form-control','checked'=>true), array('div'=>'clearfix', 
                    'before'=>'<div class="form-group"><label>'.__('Activado').'</label><div class="input"></div>',
                    'after'=>'</div>','label'=>false, 'class'=>''));
                ?>
            </div>
            <?php echo $this->Form->end(__('Agregar Cliente'), array('class'=>'btn btn-primary', 'div'=>false));?>
        </div>
        
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#ClienteAddForm').bootstrapValidator({
        message: 'El valor ingresado no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'data[Cliente][nombre]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Nombre es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][apellido]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Apellido es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][sexo]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Sexo es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][calle]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Calle es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][numero]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Altura es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][piso]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo piso es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][telefono]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo telefono es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][provincia]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo provincia es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][localidad]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo localidad es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Cliente][codigo_postal]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo codigo postal es obligatorio y no puede estar vacio'
                    }
                }
            },
            
            'data[User][email]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo email  es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[User][password]': {
                    
                validators: {
                    notEmpty: {
                        message: 'El campo contraseña es obligatorio y no puede estar vacio'
                    },
                    identical: {
                        field: 'data[User][password2]',
                        message: 'El campo contraseña y confirmar contraseña no coinciden'
                    }
                }
            },
            'data[User][password2]': {
                validators: {
                    notEmpty: {
                        message: 'El campo confirmar contraseña es obligatorio y no puede estar vacio'
                    },
                    identical: {
                        field: 'data[User][password]',
                        message: 'El campo contraseña y confirmar contraseña no coinciden'
                    }
                }
            }
        }
    });
});
</script>
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