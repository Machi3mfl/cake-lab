<style>
body{
  background: rgba(0, 0, 0, 0) url(../img/background-2.jpg) no-repeat scroll center center / cover !important;
}
.wrapper{
  background-color: transparent !important;
}

header{
  height: 40% !important;
}

header, header span{
  color:white !important;
}
</style>
<?php
    echo $this->Html->css('/css/cliente/component.css');
    echo $this->Html->css('/css/cliente/default.css');
    echo $this->Html->script('/js/cliente/modernizr.custom.js');
?>
<div class="container col-md-10 col-md-offset-1">
			<header>
				<h1>Foto Profesional <span>Bienvenidos</span></h1>
			</header>
			<div class="col-md-10 col-md-offset-1">
				<nav id="menu" class="nav">
					<ul>
						<li>
							<a href="<?php echo Router::url('/'); ?>">
								<span class="icon">
									<i aria-hidden="true" class="ti-home btn-magnify"></i>
								</span>
								<span>Inicio</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Router::url('/').'pedidos/nuevo'; ?>">
								<span class="icon">
									<i aria-hidden="true" class="ti-write"></i>
								</span>
								<span>Crear Pedido</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Router::url('/').'pedidos/ver'; ?>">
								<span class="icon">
									<i aria-hidden="true" class="ti-shopping-cart"></i>
								</span>
								<span>Pedidos</span>
							</a>
						</li>
						<li>
							<a href="<?php echo Router::url('/').'users/logout'; ?>">
								<span class="icon">
									<i aria-hidden="true" class="ti-power-off"></i>
								</span>
								<span>Salir</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div><!-- /container -->
