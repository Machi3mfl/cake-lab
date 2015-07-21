<style>
    /* layout.css Style */
.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}
</style>
        <?php   echo $this->Form->create('Upload',array('type' => 'file','class'=>'form-inline','url' => array('controller' => 'uploads', 'action' => $this->action))); ?>
        <div class="form-group">    
            <?php   echo $this->Form->input('Upload.photo.', array('type' => 'file', 'multiple'=>true)); ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span>
            Agregar fotos
            </button>
        </div>
        <?php   echo $this->Form->end(); ?>
    <br>
<script type="text/javascript">
$("#submit").bind('click', function(){ 
    $.ajax({
        async:true, 
        type:'post', 
        complete:function(request, json) {
            $('#resultados').html(request.responseText); 
        }, 
        url:'/uploads/index', 
        data:$(this).parents('form:first').serialize()
    }) 
});
</script>    

<div id="resultados" style="border-top: 1px solid #CCCCCC;" >
  <div >
    <h3>Imagenes Agregadas</h3>
  </div>
  <br>
<?php if(isset($imgs)) :  {?>
    <!-- Table -->
  <table class="table table-hover">
      <thead>
          <tr>
              <th>
                  Miniatura
              </th>
              <th>
                  Nombre
              </th>
              <th>
                  Categoria
              </th>
              <th>
                  Papel
              </th>
              <th>
                  Tamaño
              </th>
              <th>
                  Cantidad
              </th>
              <th>
                  Acciones
              </th>
          </tr>
      </thead>
      
      <tbody>
    <?php } 
    
    foreach($imgs as $img) : ?>
    <tr> 
        
        <th>
           <?php echo $this->Html->image('../files/uploads/'.$img['Upload']['photo_dir'].'/thumb_'.$img['Upload']['photo'] ); ?>
        <th>
            <?php echo $img['Upload']['photo']; ?>
        </th>
        <?php   echo $this->Form->create('Copias',array('type' => 'file','class'=>'form-inline','url' => array('controller' => 'copias', 'action' => 'buscar'))); ?>
        <th>
            <?php echo $this->Form->select('categoria', $categorias ,array('class'=>'form-control')); ?>
        </th>
        <th>
            <?php echo $this->Form->select('papel', $superficies ,array('class'=>'form-control')); ?>
        </th>
        <th>
            <?php echo $this->Form->select('tamaño', $tamanos ,array('class'=>'form-control')); ?>
        </th>
        <th>
            <?php echo $this->Form->input('cantidad',array('class'=>'form-control','id'=>'cantidad','placeholder'=>'Ingrese cantidad', 'label'=> false)); ?>
        </th>
        <?php $this->Form->end();?>
        <th>
            <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
            </button>
            <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
            </button>
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
            </button>
            <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
            </button>
        </th>
    </tr>        
<?php   
    endforeach;
    else: ?>
    
    <!-- Drop Zone -->
          <div class="upload-drop-zone" id="drop-zone">
            No se han subido fotos todavia. Seleccione las imagenes que desea subir a traves del botón examinar.
          </div>
<?php
    endif; 
?>
    </tbody>
    </table>
</div>
</div>



