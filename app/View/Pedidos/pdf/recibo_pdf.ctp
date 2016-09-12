<html>
<head>
  <link href="css/twitter/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    }
    #content{
      width: 90% !important;
      margin: 0 auto !important;
    }
    .black{
      color:black !important;
    }

    #recibo {
      margin-bottom: 5%;
    }

    #info-productos {
      border: 1px solid #f1f1f1 !important;
      padding: 1% 1.5% !important;
    }

    #info-observaciones {
      border-top: 1px solid #d9d9d9;
      margin: 0 auto;
      width: 90%;
      margin-bottom: 2%;
    }
    .centrado{
      text-align: center !important;
    }

    .dl-horizontal dt {
      clear: left;
      float: left;
      overflow: hidden;
      text-align: right;
      text-overflow: ellipsis;
      white-space: nowrap;
      width: 160px;
    }


    dl {
      margin-bottom: 20px;
      margin-top: 0;
    }

    dt {
      font-weight: 700;
    }
    dd, dt {
      line-height: 1.42857;
    }

    #titulo{
      padding: 2% 0;
      border-bottom: 1px solid #e1e1e1;
    }

    #prov{
      margin-left: 180px;
    }

    #info-clientes{
      width: 80%;
      margin: 0 auto;
      padding-top: 1% 0;
    }
  </style>
</head>
<body>
<div id="content black">
  <div id="recibo">
    <legend id="titulo" class="centrado"><h3>Recibo Numero #<?php echo $pedido['Pedido']['id']; ?></h3></legend>
    <div id="info-clientes">
      <dl class="dl-horizontal black">
        <dt>Nombre </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['nombre_completo']; ?></dd>
        <dt>Direccion </dt><dd class="text-capitalize"><?php echo $pedido['Cliente']['direccion'].' Piso/Dpto '.$pedido['Cliente']['piso']; ?></dd>
        <dd id="prov"><?php echo $provincia[$pedido['Cliente']['provincia']].' '.$localidad[$pedido['Cliente']['localidad']]; ?></dd>
        <dt>Codigo Postal </dt><dd><?php echo $pedido['Cliente']['codigo_postal']; ?></dd>
        <dt>Telefono </dt><dd><?php echo $pedido['Cliente']['telefono']; ?></dd>
      </dl>
    </div>
    <div id="info-observaciones">
      <h4>Observaciones</h4><p class="black"><?php echo $pedido['Pedido']['observaciones']; ?></p>
    </div>
    <div id="info-productos">
      <legend class="centrado"><h3>Productos</h3></legend>
      <table class="table black">
        <thead>
          <tr>
            <th colspan="4">Detalles</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($copias as $copia) : ?>
          <?php
            if(!function_exists('money_format')){
              $precio = number_format($copia['Copia']['precio'], 2);
              $subtotal = $precio * $copia['Copia']['cantidad'];
              $subtotal = number_format($subtotal, 2);
              $imp = number_format($pedido['Pedido']['importe'], 2);
            }else{
              $precio = money_format('%(#10n',$copia['Copia']['precio']);
              $subtotal = $precio * $copia['Copia']['cantidad'];
              $subtotal = money_format('%(#10n',$subtotal);
              $imp = money_format('%(#10n',$pedido['Pedido']['importe']);
            }
          ?>
          <tr>
            <td><?php echo $copia['Copia']['cantidad'] ?></td>
            <td>
              <?php
                echo $categorias[$copia['Producto']['categoria_id']].' '.$superficies[$copia['Producto']['superficie_id']].' '.$tamanos[$copia['Producto']['tamano_id']];
              ?>
            </td>
            <td><small>$ <?php echo $precio; ?></small></td>
            <td>$ <?php echo $subtotal; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td><?php echo $pedido['Pedido']['cantidad']; ?></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td>$ <?php echo $imp; ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
</body>
</html>
