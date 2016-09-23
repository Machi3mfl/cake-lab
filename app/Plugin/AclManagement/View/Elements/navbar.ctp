<nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse ">
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                    <i class="ti-settings"></i>
                    <p>Configuración</p>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url('/admin/users');?>">Administrar Usuarios</a></li>
                    <li><a href="<?php echo $this->Html->url('/admin/users/add');?>">Nuevo Usuario</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->Html->url('/estados');?>">Administrador Estados</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->Html->url('/admin/groups');?>">Administrar Grupos</a></li>
                    <li><a href="<?php echo $this->Html->url('/admin/groups/add');?>">Nuevo Grupo</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>"><span class="glyphicon glyphicon-lock"></span>Permisos</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                        <i class="ti-user"></i>

			                  <p><?php echo ucfirst($this->Session->read('Auth.User.name'));?> <b class="caret"></b></p>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li><?php echo $this->Html->link('Cerrar sesion', '/users/logout');?>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
</nav>
