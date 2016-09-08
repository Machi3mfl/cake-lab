<?php
  use Dompdf\Dompdf;
  require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'autoload.inc.php');
  $dompdf = new Dompdf();
  $dompdf->set_option('defaultFont', 'DejaVuSansMono');
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->load_html(utf8_decode($content_for_layout), Configure::read('App.encoding'));
  $dompdf->render();
  $dompdf->stream("recibo-pedido#".$this->request->params['pass'][0]);
