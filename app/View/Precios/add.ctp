<div class="col-md-2">
    <legend>
        <h3><?php echo __('Acciones'); ?></h3>
    </legend>
    <ul class="nav nav-sidebar">
        <li><?php echo $this->Html->link(__('Listar Precios'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Ver Listas'), array('controller' => 'listas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Lista'), array('controller' => 'listas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Productos'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="col-md-8">
        
        <legend>
            <?php if(isset($lista)){ ?>
            <h3><?php echo 'Lista de precios '.$lista["lista"]["nombre"];
            
                echo '<small>';
                echo ' > Añadir Precios'; 
                echo '</small>';
            }
            ?>
            </h3>
        </legend>
        <div class="col-md-9">
            <?php echo $this->Form->create('Precio'); ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                       #
                    </th>
                    <th>
                       Categoria
                    </th>
                    <th>
                       Superficie
                    </th>
                    <th>
                       Tamaño
                    </th>
                    <th>
                       Precio
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php  if(isset($productos)):{
                    $cont =0;
                    foreach ($productos as $producto):{
                ?>
                <tr>
                    
                    <th>
                        <?php echo $this->Form->input('Precio.'.$cont.'.producto_id',array(
                            'type'=>'hidden',
                            'value'=>$producto["productos"]["id"]));  
                        ?>
                        <?php echo $this->Form->input('Precio.'.$cont.'.lista_id',array(
                            'type'=>'hidden',
                            'value'=>$lista["lista"]["id"]));  
                        ?>
                    </th>
                    <th>
                       <?php echo $producto["Categoria"]["nombre"]; ?>
                    </th>
                    <th>
                       <?php echo $producto["Superficie"]["tipo"]; ?>
                    </th>
                    <th>
                       <?php echo $producto["Tamano"]["tamano"]; ?>
                    </th>
                    
                    <th>
                    <div class="form-group">
                       <?php echo $this->Form->input('Precio.'.$cont.'.precio',array('class'=>'form-control')); ?>
                    </div>
                    </th>
                </tr>
                <?php 
                    $cont++;
                    }endforeach;
                }endif;
                ?>
                </tbody>
            </table>
        
        <?php echo $this->Form->submit('Aceptar',array('class'=>'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
        </div>
</div>

