<?php
App::uses('AppController', 'Controller');
App::uses('UploadsController','Controller');

/**
 * Copias Controller
 *
 * @property Copia $Copia
 */
class CopiasController extends AppController {

    public $helpers = array('Js','Html', 'Form');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();

    }
 /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Copia->recursive = 0;
		$this->set('copias', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Copia->id = $id;
		if (!$this->Copia->exists()) {
			throw new NotFoundException('Invalid copia','error');
		}
		$this->set('copia', $this->Copia->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Copia->create();
			if ($this->Copia->save($this->request->data)) {
				$this->Session->setFlash('The copia has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The copia could not be saved. Please, try again.','error');
			}
		}
		$pedidos = $this->Copia->Pedido->find('list');
		$productos = $this->Copia->Producto->find('list');
		$uploads = $this->Copia->Upload->find('list');
		$this->set(compact('pedidos', 'productos', 'uploads'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Copia->id = $id;
		if (!$this->Copia->exists()) {
			throw new NotFoundException('Invalid copia','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Copia->save($this->request->data)) {
				$this->Session->setFlash('The copia has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The copia could not be saved. Please, try again.','error');
			}
		} else {
			$this->request->data = $this->Copia->read(null, $id);
		}
		$pedidos = $this->Copia->Pedido->find('list');
		$productos = $this->Copia->Producto->find('list');
		$uploads = $this->Copia->Upload->find('list');
		$this->set(compact('pedidos', 'productos', 'uploads'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Copia->id = $id;
		if (!$this->Copia->exists()) {
			throw new NotFoundException('Invalid copia','error');
		}
		if ($this->Copia->delete()) {
			$this->Session->setFlash('Copia deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Copia was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}


    public function guardarCopiasForm(){
      $this->autoRender=false;
      $form = $this->request->data['Copias'];
      if ($this->Session->check('CopiasForm')){
        $this->Session->delete('CopiasForm');
        $this->Session->write('CopiasForm',$form);
      } else{
        $this->Session->write('CopiasForm',$form);
      }

      debug($this->Session->read('CopiasForm'));
    }


      public function guardarCopias(array $copias, $pedido_id){
        foreach($copias as $copia){
          if(!empty($copia)){
            $copia["pedido_id"]= $pedido_id;
            $this->Copia->set($copia);
            $this->Copia->create();
            $this->Copia->save($copia);
          }else{
            $this->Session->setFlash("No se pudo guardar");
          }
        }
        /*foreach($copias as $copia){
          $this->Copia->create();

          if(!empty($uploads[$cont]["Upload"]["photo"])){
            $this->Upload->create();
            $uploads[$cont]["Upload"]["photo_dir"]=$pedido_id;
            $this->Upload->save($uploads[$cont]);
            $upload_id=$this->Upload->getLastInsertId();

            $copia["upload_id"]=$upload_id;
            $copia["pedido_id"]= $pedido_id;

            $this->Copia->set($copia);
            $this->Copia->save($this->Copia->data);
          }else{
            $this->Session->setFlash("No se pudo guardar");
          }
          $cont++;
        }*/

      }
}
