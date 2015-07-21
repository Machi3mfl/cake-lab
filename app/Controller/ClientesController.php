<?php
App::uses('AppController', 'Controller');
App::uses('UsersController', 'AclManagement.Controller');

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController {

    function beforeFilter() {
        parent::beforeFilter();
        

    } 
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cliente->recursive = 0;
                $this->paginate();
		$this->set('clientes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente','error'));
		}
		$this->set('cliente', $this->Cliente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $controller = new UsersController();
        if ($this->request->is('post')) {
            $this->request->data(
                    'User.name', $this->request->data['Cliente']['apellido'].' '.$this->request->data['Cliente']['nombre']
                   );
            $this->Cliente->User->create();
            if ($controller->agregar($this->request->data['User'])) {
                $this->Cliente->create();
                $user_id= $this->Cliente->User->getLastInsertId();
                debug($user_id);
                $this->request->data('Cliente.user_id', $user_id);
                //debug($this->request->data);
                $this->Cliente->save($this->request->data['Cliente']);
                $this->Session->setFlash('The cliente has been saved','success');
            } else {
                        $this->Session->setFlash('The cliente could not be saved. Please, try again.','error');
                }
            }
            
        
        $group = ClassRegistry::init('Group');
        $groups = $group->find('list', array('conditions' => array('Group.name' => 'cliente')));
        $this->cargar_provincia();
        $this->cargar_localidad();
        $this->set(compact('users','groups'));

    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException('Invalid cliente','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('The cliente has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The cliente could not be saved. Please, try again.','error');
			}
		} else {
			$this->request->data = $this->Cliente->read(null, $id);
		}
		$users = $this->Cliente->User->find('list');
		$this->set(compact('users'));
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException('Invalid cliente','error');
		}
		if ($this->Cliente->delete()) {
			$this->Session->setFlash('Cliente deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Cliente was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * add method
 *
 * @return void
 */
	public function nuevo() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('The cliente has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The cliente could not be saved. Please, try again.','error');
			}
		}
                
		$group = ClassRegistry::init('Group');
                $users = $this->Cliente->User->find('list');
                $groups = $group->find('list');
                $this->set(compact('users','groups'));
	}
        
        function cargar_provincia(){
            $prov = ClassRegistry::init('Provincia');
            $datos=$prov->find('list',array('order'=>'nom_prov ASC'));
            $this->set('provincias',$datos);
        }

        function cargar_localidad(){
            $loc = ClassRegistry::init('Localidad');
            $datos=$loc->find('list',array('order'=>'nom_loc ASC'));    
            //$datos=$loc->find('list',array('order'=>'nom_loc ASC', 'conditions'=>"(substring(Localidad.cod_loc from 1 for 2))::integer=($cod_prov)"));
            $this->set("localidades",$datos);
        }

        public function buscarPorUsuario($usuario_id){
            $cliente=$this->Cliente->find('all',array('conditions'=> array('Cliente.user_id'=>$usuario_id)));
            if (!empty($cliente)){
                return $cliente;
            }else{
                return null;
            }
        }

        public function home(){
            $this->layout= 'login';
        }
        
}
