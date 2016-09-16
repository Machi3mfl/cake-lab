<?php
App::uses('AppController', 'Controller');
/**
 * Listas Controller
 *
 * @property Lista $Lista
 */
class ListasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lista->recursive = 0;
		$this->set('listas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
			$this->loadModel('Producto');
			$this->Lista->recursive=3;

			if ($this->request->is('ajax')) {
	      $this->layout = 'ajax';
	      $id = $this->request->data['id'];
	    }
			$this->Lista->id = $id;
			if (!$this->Lista->exists()) {
              throw new NotFoundException('Invalid lista','error');
      }else{
				$prod_lista=$this->contarProductos($id);
				$total= $this->Producto->find('count');
				if($prod_lista < $total){
					$this->Session->setFlash('La lista contiene menos productos que los existentes en stock. Por favor edite la lista para actualizar la cantidad de productos.','error');
				}
				if($prod_lista > $total){
					$this->Session->setFlash('La lista contiene más productos que los existentes en stock. Por favor edite la lista para actualizar la cantidad de productos.','error');
				}
        $this->set('lista', $this->Lista->read(null, $id));
			}
  }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lista->create();
			if ($this->Lista->save($this->request->data)) {
				$this->Session->setFlash('The lista has been saved','success');
        $id=$this->Lista->getLastInsertID();
				$this->redirect(array('controller' => 'precios', 'action' => 'add',$id));
			} else {
				$this->Session->setFlash('The lista could not be saved. Please, try again.','error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel('Precio');
		$this->loadModel('Producto');
		$this->Lista->recursive=3;
		$this->Lista->id = $id;
		if (!$this->Lista->exists()) {
			throw new NotFoundException('Lista incorrecta');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Precio->saveAll($this->request->data['Precio'])){
				$this->Session->setFlash('La lista ha sido editada correctamente','success');
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash('La lista no ha sido editada. Por favor, intente nuevamente.','error');
			}
		} else {
			$prod_lista=$this->contarProductos($id);
			$total= $this->Producto->find('count');
			if($prod_lista < $total){
				$this->Session->setFlash('La lista contiene menos productos que los existentes en stock. Por favor actualice la lista.','error');
			}
			if($prod_lista > $total){
				$this->Session->setFlash('La lista contiene más productos que los existentes en stock. Por favor actualice la lista.','error');
			}

			$this->request->data = $this->Lista->read(null, $id);
			$this->set('lista',$this->Lista->read(null, $id));
		}
	}

	public function contarProductos($id_lista = null){
		$this->loadModel('Precio');
		return $this->Precio->find('count', array('conditions' => array('Precio.lista_id' => $id_lista)));
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
		$this->Lista->id = $id;
		if (!$this->Lista->exists()) {
			throw new NotFoundException('Invalid lista','error');
		}
		if ($this->Lista->delete()) {
			$this->Session->setFlash('Lista deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Lista was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}

	public function editarNombre($id = null){
		$this->Lista->id = $id;
		if (!$this->Lista->exists()) {
			throw new NotFoundException('Lista incorrecta');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Lista->set($this->request->data);
			if($this->Lista->save()){
				$this->Session->setFlash('La lista ha sido editada correctamente','success');
				$this->redirect(array('action' => 'index'));
			}else {
				$this->Session->setFlash('La lista no ha sido editada. Por favor, intente nuevamente.','error');
			}
		}
		$this->set('lista',$this->Lista->read(null, $id));
	}

}
