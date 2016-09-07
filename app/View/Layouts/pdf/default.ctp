<?php
  use Dompdf\Dompdf;
  require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'autoload.inc.php');
  $dompdf = new Dompdf();
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->load_html(utf8_decode($content_for_layout), Configure::read('App.encoding'));
  $dompdf->render();
  $dompdf->stream("ticket-pedido#".$this->request->params['pass'][0]);
