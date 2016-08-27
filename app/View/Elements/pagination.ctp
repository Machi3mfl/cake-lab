<div class="pagination col-md-12">
<p>
<?php
  echo $this->Paginator->counter(array(
  'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count} , comienza en el registro {:start}, finaliza en el registro {:end}')
  ));
?>
</p>
<nav>
   <div class="col-md-12 text-center">
     <ul class="pagination">
         <li><?php echo $this->Paginator->prev('Anterior', array(), null, array('class' => 'prev disabled'));?></li>
         <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
         <li><?php echo $this->Paginator->next('Siguiente', array(), null, array('class' => 'next disabled'));?></li>
     </ul>
   </div>
 </nav>
</div>
