<?php
App::uses('AppController', 'Controller');
/**
 * SuperficieTamanos Controller
 *
 * @property SuperficieTamano $SuperficieTamano
 */
class SuperficieTamanosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SuperficieTamano->recursive = 0;
		$this->set('superficieTamanos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SuperficieTamano->id = $id;
		if (!$this->SuperficieTamano->exists()) {
			throw new NotFoundException(__('Invalid superficie tamano'));
		}
		$this->set('superficieTamano', $this->SuperficieTamano->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SuperficieTamano->create();
			if ($this->SuperficieTamano->save($this->request->data)) {
				$this->Session->setFlash(__('The superficie tamano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superficie tamano could not be saved. Please, try again.'));
			}
		}
		$superficies = $this->SuperficieTamano->Superficie->find('list');
		$tamanos = $this->SuperficieTamano->Tamano->find('list');
		$this->set(compact('superficies', 'tamanos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SuperficieTamano->id = $id;
		if (!$this->SuperficieTamano->exists()) {
			throw new NotFoundException(__('Invalid superficie tamano'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SuperficieTamano->save($this->request->data)) {
				$this->Session->setFlash(__('The superficie tamano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The superficie tamano could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SuperficieTamano->read(null, $id);
		}
		$superficies = $this->SuperficieTamano->Superficie->find('list');
		$tamanos = $this->SuperficieTamano->Tamano->find('list');
		$this->set(compact('superficies', 'tamanos'));
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
		$this->SuperficieTamano->id = $id;
		if (!$this->SuperficieTamano->exists()) {
			throw new NotFoundException(__('Invalid superficie tamano'));
		}
		if ($this->SuperficieTamano->delete()) {
			$this->Session->setFlash(__('Superficie tamano deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Superficie tamano was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function tamano_by_superficie($superficie_id = null) {
		$this->layout = false;
		if ($this->request->is('get')) {

			if ($superficie_id == null) {
				return;
			}

			$superficie_tamano = $this->SuperficieTamano->find('all', 
				array(
					'conditions' => array(
						'superficie_id' => $superficie_id
					),
					'fields' => array('tamano_id')
				)
			);

			$tamano_ids = array();
			foreach ($superficie_tamano as $key => $value) {
				$tamano_ids[] = $value['SuperficieTamano']['tamano_id'];
			}

			$this->loadModel('Tamano');
			$tamanos = $this->Tamano->find('list', 
				array(
					'conditions' => array(
						'id' => array_values($tamano_ids)
					)
				)
			);
			$this->set('tamanos', $tamanos);
		}
	}
}
