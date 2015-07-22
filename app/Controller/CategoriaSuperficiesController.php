<?php
App::uses('AppController', 'Controller');
/**
 * CategoriaSuperficies Controller
 *
 * @property CategoriaSuperficy $CategoriaSuperficy
 */
class CategoriaSuperficiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CategoriaSuperficy->recursive = 0;
		$this->set('categoriaSuperficies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CategoriaSuperficy->id = $id;
		if (!$this->CategoriaSuperficy->exists()) {
			throw new NotFoundException(__('Invalid categoria superficy'));
		}
		$this->set('categoriaSuperficy', $this->CategoriaSuperficy->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriaSuperficy->create();
			if ($this->CategoriaSuperficy->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria superficy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria superficy could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->CategoriaSuperficy->Categorium->find('list');
		$superficies = $this->CategoriaSuperficy->Superficie->find('list');
		$this->set(compact('categorias', 'superficies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CategoriaSuperficy->id = $id;
		if (!$this->CategoriaSuperficy->exists()) {
			throw new NotFoundException(__('Invalid categoria superficy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CategoriaSuperficy->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria superficy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria superficy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CategoriaSuperficy->read(null, $id);
		}
		$categorias = $this->CategoriaSuperficy->Categorium->find('list');
		$superficies = $this->CategoriaSuperficy->Superficie->find('list');
		$this->set(compact('categorias', 'superficies'));
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
		$this->CategoriaSuperficy->id = $id;
		if (!$this->CategoriaSuperficy->exists()) {
			throw new NotFoundException(__('Invalid categoria superficy'));
		}
		if ($this->CategoriaSuperficy->delete()) {
			$this->Session->setFlash(__('Categoria superficy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Categoria superficy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function superficies_by_category($categoria_id = null) {
		$this->layout = false;
		if ($this->request->is('get')) {

			if ($categoria_id == null) {
				return;
			}

			$categorias_superficies = $this->CategoriaSuperficy->find('all', 
				array(
					'conditions' => array(
						'categoria_id' => $categoria_id
					),
					'fields' => array('superficie_id')
				)
			);

			$superficies_ids = array();
			foreach ($categorias_superficies as $key => $value) {
				$superficies_ids[] = $value['CategoriaSuperficy']['superficie_id'];
			}

			$this->loadModel('Superficie');
			$superficies = $this->Superficie->find('list', 
				array(
					'conditions' => array(
						'id' => array_values($superficies_ids)
					)
				)
			);
			$this->set('superficies', $superficies);
		}
	}
}
