<style>.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
body{
    margin-top:5%;
    margin-bottom:3%;
}
</style>
<div class="container">
	<!--***************** PASOS TABS *********************-->
	<div class="row form-group">
    <div class="col-xs-12">
      <ul class="nav nav-pills nav-justified thumbnail setup-panel">
        <li class="active">
          <a href="#step-1">
            <h4 class="list-group-item-heading">Paso 1</h4>
            <p class="list-group-item-text">Añadir copias</p>
        	</a>
          </li>
          <li class="disabled">
            <a href="#step-2">
              <h4 class="list-group-item-heading">Paso 2</h4>
              <p class="list-group-item-text">Confirmación del pedido</p>
            </a>
          </li>
      </ul>
    </div>
	</div>
  <div class="row setup-content" id="step-1">
	<!--******************** PASO 1 ***************************-->
    <div class="col-xs-12 col-md-12">
      <h3 class="text-center well"><?php echo __('Agregando nuevo Pedido'); ?></h3>
    <div class="row">
      <div class="col-xs-12">
        <legend><h3> Paso 1 <small>: Añadir copias</small></h3></legend>
      </div>
    </div>
    <div id="paso-2" style="position: relative;">
      <h3> Seleccion de imagenes <small>: A continuacion seleccione los imágenes que desea enviar.
          A traves del botón examinar puede seleccionar una o muchas fotos. Aprentando el atajo CTRL + E puede seleccionar todas las imagenes de una carpeta.</small></h3>
      <div class="divider"></div>
      	<?php   echo $this->Form->create('Upload',array('type' => 'file','class'=>'form-inline','url' => array(
						'controller' => 'pedidos', 'action' => $this->action)));
				?>
      <div class="form-group">
        <?php echo $this->Form->input('Upload.photo.', array(
					'type' => 'file', 'multiple'=>true,'class'=>'filestyle', 'data-buttonBefore' => 'true',
					'data-placeholder' => "No hay archivos" , 'data-buttonName' => "btn-primary"));
				?>
      </div>
      <div class="form-group">
        <button id="addFiles" type="submit" class="btn btn-success" action="">
            <span class="glyphicon glyphicon-cloud-upload"></span> Subir fotos
        </button>
      </div>
        <?php echo $this->Form->end(); ?>
      <br>
	      <?php echo $this->Form->create('Upload.Copias',array('role'=>"form", 'data-toggle' => 'validator', 'class'=>'form-inline','url' =>array(
						'controller' => 'pedidos','action' => 'confirmar')));
	      ?>
      <div id="resultados" > <!--******************** DIV IMAGENES AGREGADAS ***************-->
	    	<?php
		      $cantidad = count($this->Session->read('imagenes'));
			      if(isset($cantidad)) :
			        echo $this->Form->input('cantidad',array('name' => 'data[Pedido][cantidad]' , 'value'=>$cantidad,'hidden'=> true,'label'=>false));
		          $disabled_button = "disabled";
		        endif;

		        if ($cantidad > 0):
		          $disabled_button = '';
		        else:
		          $disabled_button = 'disabled';
		        endif;
			    ?>
	      <div>
	        <legend><h3>Imagenes Agregadas</h3></legend>
	      </div>
	      <br>
        <?php if(isset($imgs)) :  {?>
     		<!--********************** Table ******************************-->
		    <div class="table-responsive">
		    <table class="table table-hover">
	        <thead>
	          <tr><th>Miniatura</th><th style="width:120px;">Nombre</th><th>Categoria</th><th>Papel</th><th>Tamaño</th><th>Borde</th><th>Cantidad</th><th>Acciones</th>			          </tr>
	      	</thead>
		      <tbody>
		        <?php }
			        $cant = 0;
			        foreach($imgs as $img) :
						?>
		        <tr id="copia<?php echo $cant?>">
		    		<td>
						  <?php echo $this->Form->input('Upload.'.$cant.'.id',array(
								'name' => 'data[Upload]['.$cant.'][id]','value'=>$img['Upload']['id'],'hidden'=> true,'label'=>false, 'required'=>true,'class'=> 'id'));
							?>
						  <?php echo $this->Form->input('Upload.'.$cant.'.photo_dir',array(
								'name' => 'data[Upload]['.$cant.'][photo_dir]','value'=>$img['Upload']['photo_dir'],'hidden'=> true,'label'=>false,'div'=> false, 'class'=> 'photoDir'));
							?>
						  <?php echo $this->Html->image('../files/thumbs/'.$img['Upload']['photo_dir'].'/thumb_'.$img['Upload']['photo'],array(
								'id'=>'imageresource',"class"=>'miniatura', 'alt' => $img['Upload']['photo'],'style' => 'cursor:pointer !important;'));
							?>
						</td>
			    	<td class="pre" style="width:180px">
							<div class="form-group">
								<?php echo $this->Form->input('Upload.'.$cant.'.photo',array('name' => 'data[Upload]['.$cant.'][photo]',
					      	'value'=>$img['Upload']['photo'],'hidden'=> true,'label'=>false,'div'=> false));
					    		echo $img['Upload']['photo'];
								?>
							</div>
				    </td>
				    <td>
							<div class="form-group">
				      	<?php echo $this->Form->select('Upload.Copias.'.$cant.'.categoria', $categorias ,array(
				        	'name' => 'data[Copias]['.$cant.'][categoria]','class'=>'form-control', 'required'=>true));
								?>
				   		</div>
						</td>
				    <td>
							<div class="form-group">
					      <?php echo $this->Form->select('Upload.Copias.'.$cant.'.papel', $superficies ,array(
					          'name' => 'data[Copias]['.$cant.'][papel]','class'=>'form-control', 'required'));
								?>
				     	</div>
						</td>
				    <td>
							<div class="form-group">
					      <?php echo $this->Form->select('Upload.Copias.'.$cant.'.tamano', $tamanos ,array(
					        'name' => 'data[Copias]['.$cant.'][tamano]','class'=>'form-control', 'required'));
								?>
				      </div>
						</td>
				    <td>
							<div class="form-group">
				    		<?php echo $this->Form->select('Upload.Copias.'.$cant.'.borde', array("Sí","No") ,array(
				        	'name' => 'data[Copias]['.$cant.'][borde]','class'=>'form-control', 'required'));
								?>
				      </div>
						</td>
					  <td>
			        <div class="form-group">
			        	<?php echo $this->Form->input('Upload.Copias.'.$cant.'.cantidad',array(
			            'name' => 'data[Copias]['.$cant.'][cantidad]','type'=>'number','value'=>'1', 'min'=> '1', 'class'=>'form-control','div' => false,'label'=> false, 'required'=>true));
								?>
			      	</div>
					  </td>
					  <td id="acciones">
					    <button id="eliminarUpload<?php echo $cant ?>" type="button" class="btn btn-danger borrar btn-xs pull-right"  data-toggle="tooltip" data-placement="bottom" title="Eliminar imagen">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
							<?php
								if($img['Upload']['duplicado']!='false') : { ?>
							<button id="copiarUpload<?php echo $cant ?>" type="button" class="btn btn-info copiar btn-xs pull-right"  data-toggle="tooltip" data-placement="bottom" title="Duplicar imagen">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<?php }
								endif;
							?>
					  </td>
					</tr>
				  <?php
				  	$cant++;
				    endforeach;
				  ?>
          <?php $this->Form->end(); ?>
	      <script>
                jQuery(document).ready(function(){
                    $('#UploadCopiasNuevoForm').submit(false);
                });
	      </script>
	      <?php
	        else:
	      ?>
	    	<!-- Drop Zone -->
	      <div class="upload-drop-zone" id="drop-zone">
	        No se han subido fotos todavia. Seleccione las imagenes que desea subir a traves del botón examinar.
	      </div>
	      <?php
	        endif;
	      ?>
	    	</tbody>
	    </table> <!-- div tabla imagenes -->
		</div> <!--- TABLA PARA IMAGENES SUBIDAS - ----->
    <button id="activate-step-2" type="submit" class="<?php echo $disabled_button; ?> btn btn-primary btn-lg pull-right">Siguiente</button>
  	<div class="disabled-div" style="display:block;"></div>
  	</div> <!-- div resultados -->
		</div><br>
		</div> <!-- COL-MD-12 COL-XS-12 - -->
	</div>
  <!-- FIN PASO 1 ------------------------------->
	<!-- PASO 2 -------------------->
  <div class="row setup-content" id="step-2">
    <div class="col-xs-12 col-md-12">
      <h3 class="text-center well">Completando pedido</h3>
      <legend><h3> Paso 2 <small>: Confirmación del pedido</small></h3></legend>
    	<div class="col-md-6">
        <blockquote>Datos del Cliente
          <ul type="none" id="datosCliente" class="datosCliente">
            <li><?php
            $id = $cliente['Cliente']['id'];
            echo $this->Form->input('cliente_id', array(
                'value' => $id , 'name' => 'data[Pedido][cliente_id]' , 'label' => false, 'type'=>'hidden', 'name' => 'data[Pedido][cliente_id]')); ?></li>
            <li id="clienteNombre"><?php echo $cliente['Cliente']['apellido'].' '.$cliente['Cliente']['nombre']; ?></li>
						<li><small>Cliente - Apellido Nombre</small></li>
            <li id="clienteDir"><?php echo $cliente['Cliente']['calle'].' '.$cliente['Cliente']['numero'].' / '.$cliente['Cliente']['provincia'].' - '.$cliente['Cliente']['localidad']; ?></li>
						<li><small> Dirección - Provincia / Localidad / Calle Numero Piso </small></li>
            <li id="clienteContacto"><?php echo $cliente['User']['email'].' - '.$cliente['Cliente']['telefono']; ?></li>
						<li><small> Contacto - Email / Telefono </small></li>
          </ul>
        </blockquote>
      </div> <!-- FIN COL-MD-6 -->
      <div id="PedidoDetalle"></div> <!-- FIN COL-MD-5 -->
    </div> <!-- FIN COLS 12 --------------------------->
	</div> <!-- FIN PASO 2 ------------------------------>
<!-- Img Modal -->
<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
				<img style="max-width:100%;" alt="" class="" src="">
      </div>
    </div>
  </div>
</div>
</div> <!--    FIN CONTAINER GENERAL ---->
<script type="text/javascript">
	$(document).ready(function(){
		if ($("#UploadPhoto").get(0).files.length == 0)
			$("#addFiles").hide();

		$("#UploadPhoto").change(function(){
			if ($("#UploadPhoto").get(0).files.length == 0)
				$("#addFiles").hide();
			else
				$("#addFiles").show();
		});

    $('[data-toggle="tooltip"]').tooltip();

	});
</script>
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
<script>
	function buscarCliente($id){
		$.ajax({
			async:true,
			type:'post',
			complete: function (request,response){
				var data= $.parseJSON(request.responseText);
				llenarCliente(data);
			},
			url:'/laboratorio/clientes/buscarPorId',
			data: {id: $id}
		})
	}

	function llenarCliente($datos){
		var cli= $("#ClienteId");
	  var nombre= $("#clienteNombre");
		var dir = $("#clienteDir");
		var contacto = $("#clienteContacto");

		cli.val($datos.Cliente.id);
		nombre.text($datos.Cliente.apellido+' '+$datos.Cliente.nombre+'');
		dir.text($datos.Cliente.calle+' '+$datos.Cliente.numero+' Piso/Dpto: '+$datos.Cliente.piso);
		contacto.text($datos.User.email+' '+$datos.Cliente.telefono);
	}

	function habilitarBuscador(){
	    $buscador = $("#buscador");
	    $buscador.prop('disabled',false);
	    $buscador.val('');
	}
</script>
<script>
  var x;
  x=$(document);
  x.ready(inicializarEventos);
  function inicializarEventos(){
    var x1= $("#activate-step-2");
    x1.click(obtenerPrecios);
    var c= $("#confirmar");
    c.click(confirmarPedido);
	}

	function obtenerPrecios(){
	  var datos = $("#UploadCopiasNuevoForm").serialize();
	  $.ajax({
	    method: "POST",
	    url: "../precios/getPrecios",
	    data: datos
	  })
	  .done(function( precios ) {
			$("#PedidoDetalle").html(precios);
	  });
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
	  });
	});
</script>
<script>
$(document).ready(function(){
	$(".table-responsive .copiar").on("click",function(event){
		var id=$(this).attr('id');
		var cantidad=$("#resultados #UploadCopiasCantidad").val();
		var posicion = this.id.replace('copiarUpload','');
		duplicar(id.replace('copiarUpload','copia'),cantidad,posicion);
		guardarDuplicados(posicion);
		var idnombre,name;
		//incrementa el valor del id y name del tr clonado
		$("#copia"+cantidad+" td").children().each(function(){
			if ($(this).children().attr('id')){
				idnombre = $(this).children().attr('id');
				idnombre= idnombre.replace(posicion,cantidad);
				$(this).children().attr('id',idnombre);
			}
			if ($(this).children().attr('name')){
				name = $(this).children().attr('name');
				name= name.replace(posicion,cantidad);
				$(this).children().attr('name',name);
			}
		});
	$("#copia"+cantidad+" td .id").attr('name','data[Upload]['+cantidad+'][id]');
	$("#copia"+cantidad+" td .id").attr('id','Upload'+cantidad+'Id');
	$("#copia"+cantidad+" td .photoDir").attr('name','data[Upload]['+cantidad+'][photo_dir]');
	$("#copia"+cantidad+" td .photoDir").attr('id','Upload'+cantidad+'PhotoDir');
	$("#copia"+cantidad+" td .borrar").attr('id','eliminarUpload'+cantidad);
	$("#copia"+cantidad+" .copiar").remove();
	});
});

	function duplicar(id,cantidad,posicion){
		$("#"+id).after('<tr id="copia'+cantidad+'"></tr>');
		$("#"+id).children().clone().find("td").each(function(){
			}).end().appendTo("#copia"+cantidad);
		}

	function guardarDuplicados(posicion){
		var value = $("#Upload"+posicion+"Id").val();
		var cant = parseInt(posicion)+1;
		$.ajax({
			async: true,
			method: "post",
			url: "../pedidos/duplicarUpload",
			data: {upload_id:  value}
		}).done(function(respuesta){
			var nueva_cant=parseInt($("#resultados #UploadCopiasCantidad").val())+1;
				// Actualiza las validaciones para incluir los campos nuevos
				$('#UploadCopiasAddForm').validator('update');
			$("#resultados #UploadCopiasCantidad").attr('value',nueva_cant);
		});
	}
</script>
<script>
	$(".table-responsive").on("click",".borrar",function(event){
		var id=$(this).attr('id');
		var res= confirm("¿Está seguro que desea eliminar esta copia?");
		if (res) borrar(id,id.replace('eliminarUpload',''));
	});

function borrar(id,posicion){
	var value = $("#Upload"+posicion+"Id").val();
	$.ajax({
		async: true,
		method: "post",
		url: "/laboratorio/uploads/borrarUpload",
		data: {upload_id:  value, posicion: posicion}
	}).done(function(respuesta){
		$("#copia"+posicion).remove();
		var nueva_cant=parseInt($("#resultados #UploadCopiasCantidad").val())-1;
		  // Actualiza las validaciones para incluir los campos nuevos
		  $('#UploadCopiasAddForm').validator('update');
		$("#resultados #UploadCopiasCantidad").attr('value',nueva_cant);
	});
}

  $(".miniatura").bind("click",function(event){
    var url=$(this).attr('src');
    link=url.replace('/thumbs/','/pedidos/');
    linkpedido=link.replace('thumb_','');
    var nombre=$(this).attr('alt');

    asignarImagen(linkpedido,nombre);
    $('#imgModal').modal('show');
  });


  function asignarImagen(url,nombre){
    $("#imgModal .modal-title").text(nombre);
    $("#imgModal img").attr('src',url);
  }
</script>
<?php echo $this->Html->script('Pedidos/add');?>
