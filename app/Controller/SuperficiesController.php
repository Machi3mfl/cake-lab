<?php
App::uses('AppController', 'Controller');
/**
 * Superficies Controller
 *
 * @property Superficy $Superficy
 */
class SuperficiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Superficy->recursive = 0;
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
		$this->Superficy->id = $id;
		if (!$this->Superficy->exists()) {
			throw new NotFoundException(__('Invalid superficy'));
		}
		$this->set('superficy', $this->Superficy->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Superficy->create();
			if ($this->Superficy->save($this->request->data)) {
				$this->Session->setFlash(__('The superficy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superficy could not be saved. Please, try again.'));
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
		$this->Superficy->id = $id;
		if (!$this->Superficy->exists()) {
			throw new NotFoundException(__('Invalid superficy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Superficy->save($this->request->data)) {
				$this->Session->setFlash(__('The superficy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superficy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Superficy->read(null, $id);
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
		$this->Superficy->id = $id;
		if (!$this->Superficy->exists()) {
			throw new NotFoundException(__('Invalid superficy'));
		}
		if ($this->Superficy->delete()) {
			$this->Session->setFlash(__('Superficy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Superficy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
