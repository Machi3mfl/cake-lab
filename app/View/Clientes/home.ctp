<style>
body {
    padding-top:40px;
    background-color: #444 !important;

}
.panel-body .btn:not(.btn-block) {

   width: 41%;
}
.btn {
    margin:4%;
    font-size:20px;
    height: 130px;

}

#cliente-buttons{
    background-clip: padding-box;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
    margin-left: 50px;
    margin-top: 20px;
    opacity: 0.97;
    padding: 0 !important;
    z-index: 10;
}

#site{
    height:90px;
    width: 90%;
}
#site > .glyphicon {
    font-size: 2em;

}

.glyphicon, .fa{
    color: #ffffff;
    font-size: 2em;
     top: 7%;
}

.btn-group-lg > .btn, .btn-lg {
    padding: 20px 16px;
}

.panel-body {
    padding-left:10%;
    padding-bottom:5%;
}

.loading,.loading>td,.loading>th,.nav li.loading.active>a,.pagination li.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
    background-size: 40px 40px;
animation: 2s linear 0s normal none infinite progress-bar-stripes;
-webkit-animation: progress-bar-stripes 2s linear infinite;
}
.btn.btn-default.loading,input[type="text"].loading,select.loading,textarea.loading,.well.loading,.list-group-item.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
background-image: linear-gradient(45deg, rgba(235, 235, 235, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(235, 235, 235, 0.15) 50%, rgba(235, 235, 235, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
}

.btn3d {
    transition:all .08s linear;
    position:relative;
    outline:medium none;
    -moz-outline-style:none;
    border:0px;
    margin-right:10px;
    margin-top:15px;
}
.btn3d:focus {
    outline:medium none;
    -moz-outline-style:none;
}
.btn3d:active {
    top:9px;
}
.btn-default {
    box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #adadad, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#fff;
}
.btn-primary {
    box-shadow:0 0 0 1px #428bca inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #357ebd, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#428bca;
}
 .btn-success {
    box-shadow:0 0 0 1px #5cb85c inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4cae4c, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#5cb85c;
}
 .btn-info {
    box-shadow:0 0 0 1px #5bc0de inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #46b8da, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#5bc0de;
}
.btn-warning {
    box-shadow:0 0 0 1px #f0ad4e inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #eea236, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#f0ad4e;
}
.btn-danger {
    box-shadow:0 0 0 1px #c63702 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #C24032, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#c63702;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div id="cliente-buttons" class="panel panel-primary col-xs-8">
                <div class="panel-heading">
                    <h3 class="text-center">
                         Menu principal</h3>
                </div>
                <div class="panel-body">
                    <div class="row col-xs-12">
                          <a href="<?php echo Router::url('/').'pedidos/nuevo'; ?>" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-plus "></span> <br/>Nuevo Pedido</a>
                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>Pedidos</a>
                    </div>
                    <div class="row col-xs-12">
                          <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Perfil</a>
                          <a href="<?php echo Router::url('/').'users/logout'; ?>" class="btn btn-danger btn-lg" role="button"><span class="fa fa-power-off"></span> <br/>Cerrar sesión</a>
                    </div>
                    <div class="row col-xs-12">
                    <a href="http://localhost/laboratorio" id="site" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-globe"></span> Volver al Sitio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
