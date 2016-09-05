<?php
App::uses('AppController', 'Controller');

/**
 * Productos Controller
 *
 * @property Producto $Producto
 */
class ProductosController extends AppController {

	public $components = array('Paginator');
	public $paginate = array(
			'order' => array(
					'Producto.categoria_id' => 'asc',
					'Producto.superficie_id' => 'asc',
					'Producto.tamano_id' => 'asc',
			)
	);


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->Producto->recursive = 0;
		$this->set('productos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException('Producto inválido','error');
		}
		$this->set('producto', $this->Producto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Producto->create();
			$this->Producto->set($this->request->data);
			if($this->Producto->validates()){
				if ($this->Producto->save()) {
					$this->Session->setFlash('El producto ha sigo creado correctamente','success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('El producto no ha sido guardado. Por favor, intentelo de nuevo.','error');
				}
			} else {
				$errors = $this->Producto->validationErrors;
				$this->Session->setFlash($errors['activo'][0],'error');
			}

		}
		$categorias = $this->Producto->Categoria->find('list');
		$superficies = $this->Producto->Superficie->find('list');
		$tamanos = $this->Producto->Tamano->find('list');
		$this->set(compact('categorias', 'superficies', 'tamanos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException('Producto inválido','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			$this->Producto->set($this->request->data);
			if($this->Producto->validates()){
				if ($this->Producto->save()) {
					$this->Session->setFlash('El producto ha sido editado correctamente','success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('El producto no ha sido editado. Por favor, Intentelo de nuevo.','error');
				}
			}else{
				$errors = $this->Producto->validationErrors;
				$this->Session->setFlash($errors['activo'][0],'error');
			}

		} else {
			$this->request->data = $this->Producto->read(null, $id);
		}
		$categorias = $this->Producto->Categoria->find('list');
		$superficies = $this->Producto->Superficie->find('list');
		$tamanos = $this->Producto->Tamano->find('list');
		$this->set(compact('categorias', 'superficies', 'tamanos'));
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
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException('Producto inválido','error');
		}
		if ($this->Producto->delete()) {
			$this->Session->setFlash('Producto borrado','success');
		$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El producto no ha sido borrado','error');
		$this->redirect(array('action' => 'index'));
	}

    public function buscar(){
	    $superficies= $this->Producto->Superficie->find('list');
	    $tamanos = $this->Producto->Tamano->find('list');
	    $categorias = $this->Producto->Categoria->find('list');
	    $selected_value=null;
	    $this->set(compact('superficies','tamanos','categorias'));

        if($this->request->is('post')){
           $this->Session->setFlash('Producto Encontrado','success');
        }else {
          $this->Session->setFlash('El producto no existe','error');
        }
        $conditions= array('Producto.superficie_id'=>'1','Producto.tamano_id'=>'1','Producto.categoria_id'=>'1');
    }

    public function getProducto($categoria_id,$superficie_id,$tamano_id){
        $conditions = array(
                'AND' => array(
                        array('categoria_id' => $categoria_id),
                        array('superficie_id' => $superficie_id),
                        array('tamano_id' => $tamano_id),
                    ));
        $prod= $this->Producto->find('first',
                    array('conditions'=> $conditions,'contain' => true)
                );
        return $prod;
    }

    public function superficies_by_category($categoria_id = null) {
		$this->layout = false;
		if ($this->request->is('get')) {
			if ($categoria_id == null) {
				return;
			}
			$superficies = $this->Producto->find('all',
				array(
					'conditions' => array(
						'categoria_id' => $categoria_id
					),
					'group' => 'superficie_id',
					'fields' => 'Superficie.tipo',
					'contain' => 'Superficie'
				)
			);

			$ret = array();
			foreach ($superficies as $value) {
				$ret[$value['Superficie']['id']] = $value['Superficie']['tipo'];
			}
			$this->set('superficies', $ret);
		}
	}

	public function tamano_by_superficie($superficie_id = null, $categoria_id = null) {
		$this->layout = false;
		if ($this->request->is('get')) {

			if ($superficie_id == null) {
				return;
			}

			$tamanos = $this->Producto->find('all',
				array(
					'conditions' => array(
						'superficie_id' => $superficie_id
					),
					'group' => 'tamano_id',
					'fields' => 'Tamano.tamano',
					'contain' => 'Tamano'
				)
			);
      $tamano_ids = array();
			foreach ($tamanos as $key => $value) {
				$tamano_ids[$value['Tamano']['id']] = $value['Tamano']['tamano'];
			}
			$this->set('tamanos', $tamano_ids);
		}
	}
}
