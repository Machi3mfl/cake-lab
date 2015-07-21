<?php
class interfaceController extends AppController{
	var $layout = 'media';
	var $name = 'interface' ;
	var $uses = array('Detail');

	
	function index(){
    }
	
	 
	 function media(){
    	$this->layout = 'media';
    }
	
	
	function uploadJQ()
	{
            
	    	$this->layout = 'media';
		App::import('Vendor','UploadHandler',array('file' => 'UploadHandler/upload.php')); 
		$upload_handler = new UploadHandler();
		
		header('Pragma: no-cache');
		header('Cache-Control: private, no-cache');
		header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');
		
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'HEAD':
			case 'GET':
				$upload_handler->get();
				break;
			case 'POST':
				$upload_handler->post();
				break;
			case 'DELETE':
				$upload_handler->delete();
				break;
			case 'OPTIONS':
				break;
			default:
				header('HTTP/1.0 405 Method Not Allowed');
		}
 
		exit;
	
	}
	 
	
}
?>