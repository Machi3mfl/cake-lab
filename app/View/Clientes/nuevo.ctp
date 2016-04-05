<div class="col-md-2">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul class="nav nav-sidebar">

            <li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="col-md-8">
        <legend><?php echo __('Agregando nuevo Cliente'); ?></legend>
            <blockquote>
              <p>Para dar de alta un nuevo cliente debera crear primero un usuario. Dicho usuario le servira para poder ingresar al sistema y generar pedidos</p>
            </blockquote>
        <div class="col-md-6" style="padding-bottom: 1%;">
            <legend>
                <h3>Primer paso: <small> Generar usuario </small></h3>
            </legend>
            <?php echo $this->Form->create('Usuario'); ?>
            <div class='form-group'>
                <?php   echo $this->Form->input('usuario',array('class'=>'form-control','name'=>'data[Usuario][username]'));?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('password',array('class'=>'form-control','name'=>'data[Usuario][password]'));?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('password',array('class'=>'form-control','name'=>'data[Usuario][confirm]'));?>
            </div>
            <div class='form-group'>
                <label class='control-label' for='UsuarioGrupoId'>Grupo de usuarios</label>
                <?php   echo $this->Form->select('grupo_id',$groups,array('class'=>'form-control','name'=>'data[Usuario][group_id]'));?>            
            </div>
            <?php echo $this->Form->end('Crear Usuario');?>
        </div>
                
        <div class='col-md-6 offset'>
            <legend>
                <h3>Segundo paso: <small> Dar de alta al cliente </small></h3>
            </legend>
            <?php echo $this->Form->create('Cliente'); ?>
            <div class='form-group'>
                <?php  echo $this->Form->input('nombre',array('class'=>'form-control')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('apellido',array('class'=>'form-control')); ?>
            </div>
            <div class='form-group'>
                <label class='control-label' for='ClienteSexo'>Sexo
                <?php   echo $this->Form->select('sexo',array('Masculino','Femenino')); ?>
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
                <?php  echo $this->Form->input('email',array('class'=>'form-control','placeHolder'=>'Ingrese correo electronico')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('provincia',array('class'=>'form-control','placeHolder'=>'Ingrese provincia')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('localidad',array('class'=>'form-control','placeHolder'=>'Ingrese localidad')); ?>
            </div>
            <div class='form-group'>
                <?php   echo $this->Form->input('codigo_postal',array('class'=>'form-control','placeHolder'=>'Ingrese codigo postal')); ?>
            </div>
            <div class='form-group'>               
                <label class='control-label' for='UsuarioGrupoId'>Id de Usuario</label>
            <?php   echo $this->Form->select('user_id',$users,array('class'=>'form-control','name'=>'data[Cliente][user_id]'));?>
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
            
            'data[Cliente][email]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo email  es obligatorio y no puede estar vacio'
                    }
                }
            }
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#UsuarioAddForm').bootstrapValidator({
        message: 'El valor ingresado no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'data[Usuario][username]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Usuario es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[Usuario][password]': {
                    
                validators: {
                    notEmpty: {
                        message: 'El campo contraseña es obligatorio y no puede estar vacio'
                    },
                    identical: {
                        field: 'data[Usuario][confirm]',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            'data[Usuario][confirm]': {
                validators: {
                    notEmpty: {
                        message: 'El campo confirmar contraseña es obligatorio y no puede estar vacio'
                    },
                    identical: {
                        field: 'data[Usuario][password]',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            'data[Usuario][group_id]': {
                validators: {
                    notEmpty: {
                        message: 'El campo confirmar contraseña es obligatorio y no puede estar vacio'
                    }
                }
            }
        }
    });
});
</script>