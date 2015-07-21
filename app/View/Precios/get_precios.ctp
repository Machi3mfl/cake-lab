<?php 
 //echo $this->Form->create('Precio');
 if(isset($productos) && isset($precios)):{
    $cont = 0;
    foreach($precios as $pre):{ 
        /**echo $this->Form->input('precio_id'.$cont,array('value'=>$pre['Precio']['id']));
        echo $this->Form->input('producto_id'.$cont,array('value'=>$pre['Precio']['producto_id']));
        echo $this->Form->input('lista_id'.$cont,array('value'=>$pre['Precio']['lista_id']));
        echo $this->Form->input('precio'.$cont,array('value'=>$pre['Precio']['precio']));*/
    ?>
    <div id='<?php echo 'PrecioPrecioId'.$cont; ?>'><?php echo $pre['Precio']['id'];?></div>
    <div id='<?php echo 'PrecioProductoId'.$cont; ?>'><?php echo $pre['Precio']['producto_id'];?></div>
    <div id='<?php echo 'PrecioListaId'.$cont; ?>'><?php echo $pre['Precio']['lista_id'];?></div>
    <div id='<?php echo 'PrecioPrecio'.$cont; ?>'><?php echo $pre['Precio']['precio'];?></div>
    <?php
        
    $cont++;

    }
    endforeach;
}
 endif;
 //echo $this->Form->end();
 
?>
