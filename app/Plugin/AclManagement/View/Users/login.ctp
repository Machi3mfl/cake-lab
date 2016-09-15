<div class="container bootstrap snippet">
    <div class="col-md-12">
        <div class="row login-page">
            <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                  <?php echo $this->Html->image('login/logo.png', array('class' => 'user-avatar')); ?>
                  <h2>Ingresar</h2>

                <?php
                    echo $this->Form->create('User', array('action' => 'login',
                                                    'class'=>'form-signin',
                                                    'accept-charset'=>'UTF-8',
                                                    ));
                ?>
                <div class="form-content">
          				<div class="form-group">
                  <?php
                  echo $this->Form->input('email',array(
                    'class'=>'form-control input-underline input-lg',
                    'label'=>false,
                    'placeHolder'=>'Usuario'));
                  ?>
                  </div>
                  <div class="form-group">
                  <?php   echo $this->Form->input('password', array(
                      'class'=>'form-control input-underline input-lg',
                      'label'=>false,
                      'placeHolder'=>'Contraseña'));
                  ?>
                  </div>
                  </div>
                  <?php echo $this->Form->submit(__('Ingresar'), array('class'=>'btn btn-success btn-lg','id'=>'login', 'div'=>false));?>
                	<?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {
    $('#UserLoginForm').bootstrapValidator({
        message: 'El valor ingresado no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'data[User][email]': {

                validators: {
                    notEmpty: {
                        message: 'El campo Usuario es obligatorio y no puede estar vacio'
                    }
                }
            },
            'data[User][password]': {

                validators: {
                    notEmpty: {
                        message: 'El campo Contraseña es obligatorio y no puede estar vacio'
                    }
                }
            }
        }
    });
});
</script>
