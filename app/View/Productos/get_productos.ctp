  <?php //debug($productos); ?>
  <h3><?php echo __('Precios'); ?></h3>
  <!--?php if (!empty($lista['precios'])): ?-->
  <div class="table-responsive">
  <table cellpadding = "0" cellspacing = "0" class="table table-hover">
    <tr>
      <th><?php echo __('#'); ?></th>
      <th><?php echo __('Categoria'); ?></th>
      <th><?php echo __('Superficie'); ?></th>
      <th><?php echo __('Tamaño'); ?></th>
      <th><?php echo __('Precio'); ?></th>
    </tr>
    <?php
      $i = 0;
      foreach ($productos as $prod):
    ?>
    <tr>
      <td>
        <?php echo $this->Form->input( 'Precio.'.$i.'.lista_id',array('value'=>$lista_id,'type'=>'hidden'));  ?>
        <?php echo $this->Form->input( 'Precio.'.$i.'.id',array('value'=>$prod['precios'][0]['id'],'type'=>'hidden')); ?>
      </td>
      <?php echo $this->Form->input( 'Precio.'.$i.'.producto_id',array('value'=>$prod['Producto']['id'],'type'=>'hidden'));  ?>
      <td><?php echo $prod['Categoria']['nombre']; ?></td>
      <td><?php echo $prod['Superficie']['tipo']; ?></td>
      <td><?php echo $prod['Tamano']['tamano']; ?></td>
      <td>
        <?php
            echo $this->Form->input('Precio.'.$i.'.precio' , array(
              'value' => $prod['precios'][0]['precio'] , 'type' => 'number' , 'label' => false ,
              'class' => 'form-control' , 'required' => true, 'div' => 'form-group',
              'after' => '<div class="help-block with-errors"></div>'));
        ?>
      </td>
    </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
  </table>
</div>
