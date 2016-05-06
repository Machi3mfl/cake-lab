<?php echo $this->Form->create('Pedido', array("action"=>"confirmar"));?>
<div class="col-md-5">
  <blockquote><h4> Observaciones </h4>
    <?php echo $this->Form->textarea('observaciones',
            array('class'=>'form-control',
                'rows'=>"3",
                "placeHolder"=>'Ingrese observaciones sobre el pedido'));
    ?>
  </blockquote>
</div> <!-- FIN COL-MD-5 -->
<div id="detalle" class="col-md-12">
  <legend><h3> Copias </h3></legend>
  <div class="table-responsive" id="tablaPrecios">
    <table class="table table-hover" cellspacing="0" cellpadding="0">
    <thead>
      <tr><th>Archivo</th><th>Cantidad</th><th>Categoria</th><th>Papel</th><th>Tamaño</th><th>Borde</th><th>Precio Unitario</th></tr>
    </thead>
      <tbody>
        <?php if(isset($precios)) :  {
          $cant=0;
          $copias_total=0;
          $importe=0;
          foreach($precios as $precio) :  ?>
          <tr>
            <td id='<?php echo 'nombre'.$cant; ?>'><?php echo $data['Upload'][$cant]['photo']; ?></td>
              <?php echo $this->Form->input('Copias.'.$cant.'.producto_id',array('type'=> 'hidden','value'=>$precio['Precio']['producto_id'])); ?>
            <td id='<?php echo 'cantidad'.$cant; ?>'>
              <?php
                echo $this->Form->input('Copias.'.$cant.'.cantidad',array('type'=> 'hidden','value'=>$data['Copias'][$cant]['cantidad']));
                echo $data['Copias'][$cant]['cantidad'];
              ?>
            </td>
              <?php echo $this->Form->input('Copias.'.$cant.'.upload_id',array('type'=> 'hidden','value'=>$data['Upload'][$cant]['id'])); ?>
            <td id='<?php echo 'categoria'.$cant; ?>'><?php echo $precio['productos']['categoria_id'] ?></td>
            <td id='<?php echo 'papel'.$cant; ?>'><?php echo $precio['productos']['superficie_id'] ?></td>
            <td id='<?php echo 'tamano'.$cant; ?>'><?php echo $precio['productos']['tamano_id'] ?></td>
            <td id='<?php echo 'borde'.$cant; ?>'>
              <?php
                echo $this->Form->input('Copias.'.$cant.'.borde',array('type'=> 'hidden','value'=>$data['Copias'][$cant]['borde']));
                echo $data['Copias'][$cant]['borde'];
              ?>
            </td>
            <td id='<?php echo 'precio'.$cant; ?>'>
              <?php echo $this->Form->input('Copias.'.$cant.'.precio',array('type'=> 'hidden','value'=>$precio['Precio']['precio'])); ?>
              $ <?php echo $precio['Precio']['precio']; ?></td>;
          </tr>
          <?php
          $copias_total= $copias_total+$data['Copias'][$cant]['cantidad'];
          $importe=$importe+($data['Copias'][$cant]['cantidad']*$precio['Precio']['precio']);
          $cant++;
          endforeach;
        }
        endif; ?>
        <tr id="totales">
          <td class="thick-line"></td>
          <td class="thick-line"></td>
          <td class="thick-line"></td>
          <td class="thick-line"></td>
          <td class="thick-line"></td>
          <td class="thick-line text-center"><h4>Importe Total</h4></td>
          <td class="thick-line text-right">
            <?php echo $this->Form->input('cantidad',array('type'=> 'hidden','value'=>$copias_total)); ?>
            <?php echo $this->Form->input('importe',array('type'=> 'hidden','value'=>$importe)); ?>
            <h4 id="importe-total"> $ <?php echo $importe ?></h4>
          </td>
        </tr>
      </tbody>
    </table>
  </div> <!-- FIN DIV tablaPrecios ----------------------->
</div> <!-- FIN DIV DETALLES ----------------------->
<input type="submit" id="confirmar" value="Confirmar" class="btn btn-success btn-lg pull-right">
<?php  echo $this->Form->end(); ?>
