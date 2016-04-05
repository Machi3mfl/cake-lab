<style>.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
body{ 
    margin-top:5%;
    margin-bottom:3%;
}
</style>
<div class="container">
	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Paso 1</h4>
                    <p class="list-group-item-text">Añadir copias</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Paso 2</h4>
                    <p class="list-group-item-text">Confirmación del pedido</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 ">
                <h3 class="text-center well"><?php echo __('Agregando nuevo Pedido'); ?></h3>
                <legend><h3> Paso 1 <small>: Añadir copias</small></h3></legend>
                <div>
                    <h3> Seleccion de imagenes <small>: A continuacion seleccione los imágenes que desea enviar. 
                        A traves del botón examinar puede seleccionar una o muchas fotos. Aprentando el atajo CTRL + E puede seleccionar todas las imagenes de una carpeta.</small></h3>
                    <div class="divider"></div>
                    <?php   echo $this->Form->create('Upload',array('type' => 'file','class'=>'form-inline','url' => array('controller' => 'pedidos', 'action' => $this->action))); ?>
                        <div class="form-group">    
                            <?php   echo $this->Form->input('Upload.photo.', array('type' => 'file', 'multiple'=>true)); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" action="">
                                <span class="glyphicon glyphicon-plus"></span> Agregar fotos
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

<div id="resultados" >
  <?php 
  if(isset($cantidad)) :  {
    echo $this->Form->input('cantidad',array('value'=>$cantidad,'hidden'=> true,'label'=>false));
  }
  endif;
  ?>
  <div>
      <legend>
        <h3>Imagenes Agregadas</h3>
      </legend>
  </div>
  <br>
<?php if(isset($imgs)) :  {?>
    <!-- Table -->
    <div class="table-responsive">
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
                  Borde
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
    $cant = 0;
    foreach($imgs as $img) : 
         
        ?>
    <tr> 
        
        <td>
            <?php echo $this->Form->input('Upload.'.$cant.'.id',array('value'=>$img['Upload']['id'],'hidden'=> true,'label'=>false));?>
            <?php echo $this->Form->input('Upload.'.$cant.'.photo_dir',array('value'=>$img['Upload']['photo_dir'],'hidden'=> true,'label'=>false));?>
            <?php echo $this->Html->image('../files/uploads/'.$img['Upload']['photo_dir'].'/thumb_'.$img['Upload']['photo'],
                        array('id'=>'imageresource') ); ?>
        </td>
        <td>
            
            <?php echo $this->Form->input('Upload.'.$cant.'.photo',array('value'=>$img['Upload']['photo'],'hidden'=> true,'label'=>false));?>
            <?php echo $img['Upload']['photo']; ?>
        </td>
        <?php   echo $this->Form->create('Upload.Copias',array('type' => 'file','class'=>'form-inline')); ?>
        <td>
            <?php echo $this->Form->select('Upload.Copias.'.$cant.'.categoria', $categorias ,array('class'=>'form-control')); ?>
        </td>
        <td>
            <?php echo $this->Form->select('Upload.Copias.'.$cant.'.papel', $superficies ,array('class'=>'form-control')); ?>
        </td>
        <td>
            <?php echo $this->Form->select('Upload.Copias.'.$cant.'.tamano', $tamanos ,array('class'=>'form-control')); ?>
        </td>
        <td>
            <?php echo $this->Form->select('Upload.Copias.'.$cant.'.borde', array("Sí","No") ,array('class'=>'form-control')); ?>
        </td>
        <td>
            <?php echo $this->Form->input('Upload.Copias.'.$cant.'.cantidad',array('class'=>'form-control','placeholder'=>'Ingrese cantidad', 'label'=> false)); ?>
        </td>
        
        <td>
            <button type="button" class="btn btn-info">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
            </button>
            <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
            </button>
        </td>
    </tr>        
<?php   
    $cant++;
    endforeach;
    $this->Form->end();
    else: ?>
    
    <!-- Drop Zone -->
          <div class="upload-drop-zone" id="drop-zone">
            No se han subido fotos todavia. Seleccione las imagenes que desea subir a traves del botón examinar.
          </div>
<?php
    endif; 
?>
    </tbody>
    </table> <!-- div tabla imagenes -->
    </div>
    </div> <!-- div resultados -->
    </div>
        <br>        
        <button id="activate-step-2" type="button" class="btn btn-primary btn-lg pull-right">Siguiente</button>
    </div>
    </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 class="text-center well">Completando pedido</h3>
                <legend><h3> Paso 2 <small>: Confirmación del pedido</small></h3></legend>

                <div class="col-md-6">             
                <blockquote>
                    <ul type="none">
                        <li>Cliente: <small>Apellido Nombre</small> </li>
                        <li>Direccion: <small> Provincia / Localidad / Calle Numero Piso </small> </li>
                        <li>Contacto: <small> Email / Telefono </small></li>
                    </ul>
                </blockquote>
                </div>
                <div class="col-md-5">
                    <blockquote>
                        <h4> Observaciones </h4>
                        <?php echo $this->Form->textarea('observaciones',
                                array('class'=>'form-control',
                                    'rows'=>"3",
                                    "placeHolder"=>'Ingrese observaciones sobre el pedido'));
                        ?>
                    </blockquote>
                </div>
                <div id="detalle" class="col-md-12">
                    <legend>
                        <h3> Copias </h3>
                    </legend>
                <div id="precios" style="display: none;"></div>
                <div class="table-responsive">
                <table class="table table-hover" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>
                            Archivo
                        </th>
                        <th>
                            Cantidad
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
                            Borde
                        </th>
                        <th>
                            Precio Unitario
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($imgs)) :  {
                        $cant = 0;
                        foreach($imgs as $img) : ?>   
                    <tr>
                        <td id="nombre">
                           <?php echo $img['Upload']['photo']; ?> 
                        </td>
                        <td id='<?php echo 'cantidad'.$cant; ?>'>
                            
                        </td>
                        <td id='<?php echo 'categoria'.$cant; ?>'>
                            
                        </td>
                        <td id='<?php echo 'papel'.$cant; ?>'>
                            
                        </td>
                        <td id='<?php echo 'tamano'.$cant; ?>'>
                            
                        </td>
                        <td id='<?php echo 'borde'.$cant; ?>'>
                          
                        </td>
                        <td id='<?php echo 'precio'.$cant; ?>' class="text-right">
                            
                        </td>
                    </tr>
                    <?php 
                    $cant++;
                    endforeach;
                    } endif; ?>  
                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center"><h4>Importe Total</h4></td>
                        <td class="thick-line text-right"><h4 id="importe-total"></h4></td>
                    </tr>
                </tbody>
                </table>
                </div> <!-- table responsive : detalles -->
                </div>
            </div>
            <br>
                <button id="confirmar" class="btn btn-success btn-lg pull-right">Confirmar</button>
            </div>
        </div>
</div>
<script>
var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos(){
    var x1= $("#activate-step-2");
    x1.click(obtenerPrecios);
    
    var x2= $("#activate-step-2");
    x2.click(obtenerDatos);
    
    var c= $("#confirmar")
    c.click(confirmarPedido);
    
    
}

function obtenerPrecios(){
    var datos = $("#UploadCopiasNuevoForm").serialize();
    
    $.ajax({
        method: "POST",
        url: "../precios/getPrecios",
        data: datos
    })
    .done(function( respuesta ) {
        $("#precios").html(respuesta);
        var precio,cantidad,importe,pre,subtotal;
        var total= parseInt($("#cantidad").val());
        importe=0;
        for(var i=0; i<total; i++){
            precio = $("#PrecioPrecio"+i);
            $("#precio"+i).text("$ "+precio.text());
            cantidad = parseInt($("#UploadCopias"+i+"Cantidad").val());
            pre=parseFloat(precio.text()).toFixed(2);
            subtotal= cantidad*pre;
            importe = importe + subtotal;
        }
        $("#importe-total").text("$ "+importe.toFixed(2));
    });
}

function obtenerDatos(){
    
    var cat,papel,tamano,borde,cant;
    var total= parseInt($("#cantidad").val());
    for(var i=0; i<total; i++){
        cat= $("#UploadCopias"+i+"Categoria option:selected");
        papel= $("#UploadCopias"+i+"Papel option:selected");
        tamano= $("#UploadCopias"+i+"Tamano option:selected");
        borde= $("#UploadCopias"+i+"Borde option:selected");
        cant = $("#UploadCopias"+i+"Cantidad");
       
            
        $("#categoria"+i).text(cat.text());
        $("#papel"+i).text(papel.text());
        $("#tamano"+i).text(tamano.text());
        $("#borde"+i).text(borde.text());
        $("#cantidad"+i).text(cant.val());

        
        
    }
    }

function confirmarPedido(){
    alert("Pedido Confirmado");
}
</script>
<script>
$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
       $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        
        //$(this).remove();
    });  

    
});
    
</script>