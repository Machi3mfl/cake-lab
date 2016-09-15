<div class="sidebar" data-background-color="white" data-active-color="danger">
        <!--
    		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    	-->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
          Foto Profesional
        </a>
      </div>
      <div class="logo logo-mini">
        <a href="http://www.creative-tim.com" class="simple-text">
          FP
        </a>
      </div>
    	<div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <?php echo $this->Html->image('login/logo.png', array('class' => 'user-avatar')); ?>
          </div>
          <div class="info">
              <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                  FOTO PROFESIONAL
                  <b class="caret"></b>
              </a>
              <div class="collapse" id="collapseExample">
                  <ul class="nav">
                      <li><a href="http://www.mapaeducativo.edu.ar" target="_blank">Ir a Sitio</a></li>
                  </ul>
              </div>
          </div>
        </div>
        <ul class="nav">
          <li class="">
            <?php echo $this->Html->link('<i class="ti-home"></i><p>Inicio </p>',
              array('controller' => 'pedidos', 'action' => 'index'),
              array('class' => 'btn-magnify', 'escape' => false));
            ?>

          </li>
          <li>
            <a data-toggle="collapse" href="#cPedidos" class="btn-magnify collapsed">
							<i class="ti-clipboard"></i>
							<p>Pedidos<b class="caret"></b></p>
						</a>
            <div class="collapse" id="cPedidos">
              <ul class="nav">
                <li><?php echo $this->Html->link('Ver Pedidos', array('controller' => 'pedidos' , 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Nuevo Pedido', array('controller' => 'pedidos' , 'action' => 'add')); ?></li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#cClientes" class="btn-magnify">
							<i class="ti-user"></i>
							<p>Clientes<b class="caret"></b></p>
						</a>
            <div class="collapse" id="cClientes">
              <ul class="nav">
                <li><?php echo $this->Html->link('Ver Clientes', array('controller' => 'clientes' , 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Agregar Cliente', array('controller' => 'clientes' , 'action' => 'add')); ?></li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#cProductos" class="btn-magnify">
							<i class="ti-package"></i>
							<p>Productos<b class="caret"></b></p>
						</a>
            <div class="collapse" id="cProductos">
              <ul class="nav">
                <li><?php echo $this->Html->link('Ver Productos', array('controller' => 'productos' , 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Agregar Categoria', array('controller' => 'categorias' , 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link('Agregar Superficie', array('controller' => 'superficies' , 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link('Agregar Tamaño', array('controller' => 'tamanos' , 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link('Agregar Producto', array('controller' => 'productos' , 'action' => 'add')); ?></li>

              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#cPrecios" class="btn-magnify">
							<i class="ti-money"></i>
							<p>Precios<b class="caret"></b></p>
						</a>
            <div class="collapse" id="cPrecios">
              <ul class="nav">
                <li><?php echo $this->Html->link('Ver Listas de Precios', array('controller' => 'listas' , 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('Crear Lista de Precios', array('controller' => 'listas' , 'action' => 'add')); ?></li>
              </ul>
            </div>
          </li>
        </ul>
    	</div>
</div>
