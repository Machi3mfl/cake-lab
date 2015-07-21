<?php
App::uses('AppController', 'Controller');
/**
 * Tamanos Controller
 *
 * @property Tamano $Tamano
 */
class TamanosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tamano->recursive = 0;
		$this->set('tamanos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tamano->id = $id;
		if (!$this->Tamano->exists()) {
			throw new NotFoundException(__('Invalid tamano'));
		}
		$this->set('tamano', $this->Tamano->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tamano->create();
			if ($this->Tamano->save($this->request->data)) {
				$this->Session->setFlash('The tamano has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The tamano could not be saved. Please, try again.','error');
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
		$this->Tamano->id = $id;
		if (!$this->Tamano->exists()) {
			throw new NotFoundException('Invalid tamano','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tamano->save($this->request->data)) {
				$this->Session->setFlash('The tamano has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The tamano could not be saved. Please, try again.','success');
			}
		} else {
			$this->request->data = $this->Tamano->read(null, $id);
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
		$this->Tamano->id = $id;
		if (!$this->Tamano->exists()) {
			throw new NotFoundException('Invalid tamano','error');
		}
		if ($this->Tamano->delete()) {
			$this->Session->setFlash('Tamano deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Tamano was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
