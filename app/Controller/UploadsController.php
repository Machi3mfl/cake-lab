<?php
App::uses('AppController', 'Controller');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 */
class UploadsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
            $this->Upload->id = $id;
            if (!$this->Upload->exists()) {
                    throw new NotFoundException(__('Invalid upload','error'));
            }
            $this->set('upload', $this->Upload->read(null, $id));
    }

		/**
		 * public
		 *
		 * guarda el FILE y retorna el ID del upload
		 *
		 * return array de Uploads
		 *
		 * @throws NotFoundException
		 * @param string $id
		 * @return

		**/


		public function guardar($file = array()){
			$this->Upload->set(array('photo' => $file));
			$photo = $this->Upload->data;
			//array_push($files,$photo); creo que no hace nada
			$photo["Upload"]["pedido_id"]= $this->Session->read('pedido_id');
			$photo["Upload"]["photo_dir"]= $this->Session->read('pedido_id');
			$this->Upload->create();
			if ($this->Upload->save($photo)) { // guarda el file en BD
					$guardado = $this->Upload->getLastInsertId(); //obtiene el ultimo id , para crear una pila
					return $guardado;
			}
		}
    /*
     * public
     *
     * obtiene los ultimos uploads por ID
     *
     * return array de Uploads
     */
    public function listarGuardados(array $guardados){
        if(!empty($guardados)){
            foreach($guardados as $id){
                $result[]=$this->Upload->findById($id);
            }
            return $result;
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload','error'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Upload->read(null, $id);
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('Upload deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted'));
		$this->redirect(array('action' => 'index'));
	}





}
