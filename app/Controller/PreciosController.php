<?php
App::uses('AppController', 'Controller');
App::uses('ProductosController','Controller');
/**
 * Precios Controller
 *
 * @property Precio $Precio
 */
class PreciosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Precio->recursive = 0;
		$this->set('precios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Precio->id = $id;
		if (!$this->Precio->exists()) {
			throw new NotFoundException('Invalid precio','error');
		}
		$this->set('precio', $this->Precio->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
	  if ($this->request->is('post')) {
      $precios=$this->request->data['Precio'];
      foreach($precios as $data){
          $this->Precio->create();
              if ($this->Precio->save($data)) {
                      $this->Session->setFlash('Los precios han sido guardados correctamente','success');
                      $this->redirect(array('controller'=>'listas','action' => 'index'));
              } else {
                      $this->Session->setFlash('The precio could not be saved. Please, try again.','error');
              }
          }
	  }
	  $productos=$this->Precio->productos->find('all');
	  $lista = $this->Precio->lista->find('first', array('conditions' => array('Lista.id' => $id)));
	  $this->set(compact('lista','productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Precio->id = $id;
		if (!$this->Precio->exists()) {
			throw new NotFoundException('Invalid precio','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Precio->save($this->request->data)) {
				$this->Session->setFlash('The precio has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The precio could not be saved. Please, try again.','error');
			}
		} else {
			$this->request->data = $this->Precio->read(null, $id);
		}
		$listas = $this->Precio->Lista->find('list');
		$productos = $this->Precio->Producto->find('list');
		$this->set(compact('listas', 'productos'));
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
		$this->Precio->id = $id;
		if (!$this->Precio->exists()) {
			throw new NotFoundException('Invalid precio','error');
		}
		if ($this->Precio->delete()) {
			$this->Session->setFlash('Precio deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Precio was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}


  public function getPrecios(){
		$controller = new ProductosController();
		$this->layout = false;
		$lista = 2;
		$cont= 0;
		//Buscar ID de producto
		foreach ($this->request->data['Copias'] as $prod){
			$productos[]=$controller->getProducto($prod['categoria'],$prod['papel'],$prod['tamano']);
			$conditions = array(
					'AND' => array(
									array('producto_id' => $productos[$cont]['Producto']['id']),
									array('lista_id' => 3)
							));
			$precios[]=$this->Precio->find('first',array('conditions'=>$conditions));
			$cont++;
		}
		$this->request->data['Copias']=array_values($this->request->data['Copias']);
		$this->request->data['Upload']=array_values($this->request->data['Upload']);
		$this->set("precios", $precios);
		//$this->set("data", array_values($this->request->data));
		$this->set("data", $this->request->data);
		$this->set("productos", $productos);
  }
}
