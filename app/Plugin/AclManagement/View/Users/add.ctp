<div class="col-md-10 col-md-offset-1">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">New User</li>
</ul>
    <div class="col-md-6 col-md-offset-3">
            <legend>
                <h3> Formulario de Usuario: <small> Generando nuevo usuario </small></h3>
            </legend>    
<?php echo $this->Form->create('User');?>
        <div class="form-group">
        <?php
            echo $this->Form->input('name',array('class'=>'form-control') ,array('div'=>'clearfix',
                
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'xlarge')); ?>
        </div>
        <div class="form-group">
        <?php    echo $this->Form->input('email', array('class'=>'form-control'),array('div'=>'clearfix', 
                'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'xlarge')); ?>
        </div>
        <div class="form-group">
        <?php   echo $this->Form->input('password',array('class'=>'form-control'),array('div'=>'clearfix', 
                'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'xlarge')); ?>
        </div>
        <div class="form-group">
        <?php    echo $this->Form->input('password2',array('class'=>'form-control','type'=>'password'), array('div'=>'clearfix', 'type'=>'password', 
                'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'xlarge')); 
        ?>
        </div>
        <div class="form-group">
        <?php    echo $this->Form->input('group_id',array('class'=>'form-control'), array('div'=>'clearfix',
                'after'=>'</div>','label'=>false, 'class'=>'xlarge')); ?>
        </div>
        <?php   echo $this->Form->input('status',array('class'=>'form-control'), array('div'=>'clearfix', 
                'before'=>'<div class="form-group"><label>'.__('Status').'</label><div class="input"></div>',
                'after'=>'</div>','label'=>false, 'class'=>''));
	?>
        <div class="actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
<?php echo $this->Form->end();?>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#UserAddForm').bootstrapValidator({
        message: 'El valor ingresado no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'data[User][name]': {
                
                validators: {
                    notEmpty: {
                        message: 'El campo Usuario es obligatorio y no puede estar vacio'
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
            },
            'data[User][email]': {
                validators: {
                    notEmpty: {
                        message: 'El campo email es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[User][group_id]': {
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