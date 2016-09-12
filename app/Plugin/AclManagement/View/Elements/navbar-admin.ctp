
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/laboratorio">Laboratorio</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $this->Html->url("/pedidos");?>"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-pencil"></span> Pedidos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/pedidos');?>">Ver Pedidos</a></li>
                        <li><a href="<?php echo $this->Html->url('/pedidos/add');?>">Nuevo Pedido</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-male"></span> Clientes <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/clientes');?>">Ver Clientes</a></li>
                        <li><a href="<?php echo $this->Html->url('/clientes/add');?>">Nuevo Cliente</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->Html->url('/clientes/asignar_lista');?>">Asignar Lista de precios</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-star"></span> Productos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/productos');?>">Ver Productos</a></li>
                        <li><a href="<?php echo $this->Html->url('/productos/add');?>">Nuevo Producto</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->Html->url('/categorias');?>">Ver Categorias</a></li>
                        <li><a href="<?php echo $this->Html->url('/superficies');?>">Ver Superficies</a></li>
                        <li><a href="<?php echo $this->Html->url('/tamanos');?>">Ver Tamaños</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-usd"></span> Lista de Precios <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/listas');?>">Ver Listas</a></li>
                        <li><a href="<?php echo $this->Html->url('/listas/add/');?>">Nueva lista</a></li>
                    </ul>
                </li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-user-plus"></span>Usuarios
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/admin/users');?>">Administrar Usuarios</a></li>
                        <li><a href="<?php echo $this->Html->url('/admin/users/add');?>">Nuevo Usuario</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->Html->url('/estados');?>">Administrador Estados</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="fa fa-user"></span>Grupos
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url('/admin/groups');?>">Administrar Grupos</a></li>
                        <li><a href="<?php echo $this->Html->url('/admin/groups/add');?>">Nuevo Grupo</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>"><span class="glyphicon glyphicon-lock"></span>Permisos</a></li>
                <li class="menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span> Hi, <?php echo $this->Session->read('Auth.User.name');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Ajustes</a></li>
                        <li class="divider"></li>
                        <li class="menu"><?php echo $this->Html->link('Cerrar sesion', '/users/logout'
                                                                      );?></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
