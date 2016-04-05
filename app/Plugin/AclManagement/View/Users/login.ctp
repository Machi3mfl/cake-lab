<style>
    body {
        
        background-color: #EBEBEB;        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
    
</style>
<div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="img/login/logo.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    echo $this->Form->create('User', array('action' => 'login',
                                                                    'class'=>'form-signin',
                                                                    'accept-charset'=>'UTF-8',
                                                                    ));
                                ?>

                                
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        
                                        <?php
                                        echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'placeHolder'=>'Usuario'), array('div'=>'clearfix',
                                            'before'=>'<div class="form-group">',
                                            'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'xlarge'));
                                        echo $this->Form->input('password', array('class'=>'form-control','label'=>false,'placeHolder'=>'Contraseña'),array('div'=>'clearfix','class'=>'form-control',
                                            'before'=>'<div class="form-group">',
                                            'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'xlarge'));
                                        ?>
                                        <br></br>
                                        <?php echo $this->Form->submit(__('Ingresar'), array('class'=>'btn btn-lg btn-success btn-block','id'=>'login', 'div'=>false));?>
                                        
                                    </fieldset>
                                </form>
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

