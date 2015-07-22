<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 */
class CategoriasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Categoria->recursive = 0;
		$this->set('categorias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException('Invalid categoria','error');
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('The categoria has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The categoria could not be saved. Please, try again.','error');
			}
		}

		$this->_setearModelos();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException('Invalid categoria','error');
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('The categoria has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The categoria could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException('Invalid categoria','error');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash('The categoria has been deleted.','success');
		} else {
			$this->Session->setFlash('The categoria could not be deleted. Please, try again.','error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	private function _setearModelos() {
		$this->set('superficies', $this->Categoria->Superficie->find('list'));
	}
}
