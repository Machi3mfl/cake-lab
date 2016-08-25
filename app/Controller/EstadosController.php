<?php
App::uses('AppController', 'Controller');
/**
 * Listas Controller
 *
 * @property Lista $Lista
 */
class EstadosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Estado->recursive = 0;
		$this->set('estados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
			$this->Estado->recursive=3;
      $this->Estado->id = $id;
      if (!$this->Estado->exists()) {
              throw new NotFoundException('Estado incorrecto','error');
      }else{
        $this->set('estados', $this->Estado->read(null, $id));
			}
  }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estado->create();
			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash('El estado ha sido guardado correctamente','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El estado no se ha guardado. Por favor, intente nuevamente.','error');
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

		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException('Estado incorrecto');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estado->save($this->request->data)){
				$this->Session->setFlash('El estado ha sido editado correctamente','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La estado no ha sido editado. Por favor, intente nuevamente.','error');
			}
		} else {
			$this->request->data = $this->Estado->read(null, $id);
			$this->set('estados',$this->Estado->read(null, $id));
		}
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException('Estado incorrecto','error');
		}
		if ($this->Estado->delete()) {
			$this->Session->setFlash('Estado borrado','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El estado no ha sido borrado','error');
		$this->redirect(array('action' => 'index'));
	}
}
