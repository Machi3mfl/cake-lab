<div class="col-md-6 col-md-offset-3">
    <div class="panel-new">
            <div class="panel-heading">
                <legend>
                    <h4>Buscador de productos </h4>
                </legend>
            </div>
        <div class="panel-body">
            <form class="form-inline">
            <?php $this->Form->create(); ?>
            <div class="form-group">
                <label class="control-label" for="superficie">Categorias</label>
                <?php echo $this->Form->select('categorias',$categorias,array('class'=>'form-control')); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="tamano">Superficies</label>
                <?php echo $this->Form->select('superficie', $superficies,array('class'=>'form-control'));    ?>
            </div>
            <div class="form-group">
            <label class="control-label" for="tamano">Tamaños</label>
                <?php   echo $this->Form->select('tamano', $tamanos,array('class'=>'form-control')); ?>
            </div>
            <div class="form-group">    
                <!--?php echo $this->Form->end(array(
                            'label' => __('Buscar'),
                            'class' => 'btn btn-success',
                            'div' => array(
                                'class' => 'form-group',
                                )  
                            ));
                ?-->
                <?php echo $this->Form->end('Aceptar'); ?>
            </div>    
            </form>
        </div>
    </div>
</div>