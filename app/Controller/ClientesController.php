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
			throw new NotFoundException(__('Cliente incorrecto','error'));
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
                $this->request->data('Cliente.user_id', $user_id);
                //debug($this->request->data);
                if ( $this->Cliente->save($this->request->data['Cliente']) ){
                    $this->Session->setFlash('Nuevo Cliente guardado.','success');
                }
                else{
                    $this->Session->setFlash('Existe un problema con alguno/s de los campos. Revise e intente nuevamente.','error');
                }
            } else {
                        $this->Session->setFlash('El cliente no ha sido guardado. Por favor, intente de nuevo.','error');
                }
            }


        $group = ClassRegistry::init('Group');
        $groups = $group->find('list', array('conditions' => array('Group.name' => 'cliente')));
        $listas = $this->Cliente->Lista->find('list');
        $this->cargar_provincia();
        $this->cargar_localidad();
        $this->set(compact('users','groups','listas'));

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
			throw new NotFoundException('Cliente incorrecto','error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('El cliente ha sido guardado correctamente','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El cliente no ha sido guardado. Por favor, intente de nuevo..','error');
			}
		} else {
			$this->request->data = $this->Cliente->read(null, $id);
		}
		$users = $this->Cliente->User->find('list');
		$group = ClassRegistry::init('Group');
    $listas= $this->Cliente->Lista->find('list');
    $groups = $group->find('list', array('conditions' => array('Group.name' => 'cliente')));
    $this->cargar_provincia();
    $this->cargar_localidad();
    $this->set(compact('users','groups','listas'));
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
			throw new NotFoundException('Cliente incorrecto','error');
		}

                $cl = $this->Cliente->findById($id);
		if ($this->Cliente->delete()) {
                        // Controlador de Users
                        $uController = new UsersController();
                        if ( $uController->borrar($cl['Cliente']['user_id']) ){
                            debug($cl['Cliente']['user_id']);
                        }
                        else{
                            die("asdf");
                        }

                        //$uController->agregar($this->request->data['User']);
			$this->Session->setFlash('Cliente borrado','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El cliente no ha sido borrado','error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * add method
 *
 * @return void
 */
        /*
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
*/
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


      public function buscarPorNombre(){
        $this->autoRender=false;
        $terms=$this->request->query['term'];
        $this->Cliente->recursive=-1;
        //buscar Cliente por nombre y apellido
        $datos = $this->Cliente->find('all',array(
          'conditions'=>array(
            'OR'=> array(
                'Cliente.nombre LIKE' => '%'.$terms.'%',
                'Cliente.apellido LIKE' => '%'.$terms.'%'
              )
            )
          )
          );

        $resultados=array();
        // armar Array con datos de Clientes encontrados
        if (!empty($datos)){
          $resultados = "[";
          foreach($datos as $d){
            $id = $d['Cliente']['id'];
            $nombre = strtoupper(stripslashes($d['Cliente']['nombre']));
            $apellido = strtoupper(stripslashes($d['Cliente']['apellido']));
            $resultados.= "{ ";
            $resultados.= "\"value\": \"$id\", ";
            $resultados.= "\"label\": \"$apellido $nombre\" ";
            $resultados.= "}, ";
          }
        $resultados = substr($resultados, 0, -2);
        $resultados.= "]";
        }
        else{
          $resultados = "[{ \"value\": \"\", \"label\": \"No hay resultados\" }]";
        }
        return $resultados;
      }

      public function buscarPorId(){
        $this->autoRender=false;
        $id = $this->request->data['id']; // ajax data
        $this->Cliente->recursive= -1; // ver porque recursive
        $cliente = $this->Cliente->findById($id);
        $user = $this->Cliente->User->find('first',$cliente['Cliente']['user_id']);
        $cliente['User']= $user['User'];
        $this->Session->write('cliente_id',$cliente['Cliente']['id']); //guarda id del cliente en Session
        return json_encode($cliente);
      }

}
