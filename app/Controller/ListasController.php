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
            $this->Lista->id = $id;
            if (!$this->Lista->exists()) {
                    throw new NotFoundException('Invalid lista','error');
            }
            $this->set('lista', $this->Lista->read(null, $id));
            $precios=$this->Lista->precios->find('all',array('conditions'=> array('Precios.lista_id'=> $id)));
            $productos=$this->Lista->precios->productos->find('all');
            $this->set('productos',$productos);
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
				$this->redirect(
                                        array('controller' => 'precios', 'action' => 'add',$id)
                                        );
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
		$this->Lista->id = $id;
		if (!$this->Lista->exists()) {
			throw new NotFoundException('Invalid lista','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lista->save($this->request->data)) {
				$this->Session->setFlash('The lista has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The lista could not be saved. Please, try again.','error');
			}
		} else {
			$this->request->data = $this->Lista->read(null, $id);
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
}
