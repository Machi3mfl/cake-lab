<?php
App::uses('AppController', 'Controller');
/**
 * Superficies Controller
 *
 * @property Superficie $Superficie
 */
class SuperficiesController extends AppController {

	public $uses = 'Superficie';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Superficie->recursive = 0;
		$this->set('superficies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Superficie->id = $id;
		if (!$this->Superficie->exists()) {
			throw new NotFoundException(__('Invalid superficie'));
		}
		$this->set('superficie', $this->Superficie->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Superficie->create();
			if ($this->Superficie->save($this->request->data)) {
				$this->Session->setFlash(__('Ha sido guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido guardar.Por favor, intente de nuevo.'));
			}
		}
		$this->_seterModelos();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Superficie->id = $id;
		if (!$this->Superficie->exists()) {
			throw new NotFoundException(__('Invalid superficie'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Superficie->save($this->request->data)) {
				$this->Session->setFlash(__('The superficie has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superficie could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Superficie->read(null, $id);
		}
		$this->_seterModelos();
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
		$this->Superficie->id = $id;
		if (!$this->Superficie->exists()) {
			throw new NotFoundException(__('Invalid superficie'));
		}
		if ($this->Superficie->delete()) {
			$this->Session->setFlash(__('Superficie deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Superficie was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function _seterModelos() {
		$this->set('tamanos', $this->Superficie->Tamano->find('list'));
	}
}
