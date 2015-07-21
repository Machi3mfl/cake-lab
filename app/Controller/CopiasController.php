<?php
App::uses('AppController', 'Controller');

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
        
        
        
        public function add_inline(){
        
        }
        
        public function add_pedido(){
        
        }
        
            

    
}
