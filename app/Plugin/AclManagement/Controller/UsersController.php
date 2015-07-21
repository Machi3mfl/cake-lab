<?php

App::uses('AclManagementAppController', 'AclManagement.Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AclManagementAppController {
    
    public $uses = array('AclManagement.User');

    function beforeFilter() {
        parent::beforeFilter();
        
        $this->layout = "twitter_full";

        $this->Auth->allow('login', 'logout');

        $this->User->bindModel(array('belongsTo'=>array(
            'Group' => array(
                'className' => 'AclManagement.Group',
                'foreignKey' => 'group_id',
                'dependent'=>true
            )
        )), false);
    }
    /**
     * Temp acl init db
     */
//    function initDB() {
//        $this->autoRender = false;
//
//        $group = $this->User->Group;
//        //Allow admins to everything
//        $group->id = 1;
//        $this->Acl->allow($group, 'controllers');
//
//        //allow managers to posts and widgets
//        $group->id = 2;
//        $this->Acl->deny($group, 'controllers');
//        //$this->Acl->allow($group, 'controllers/Posts'); //allow all action of controller posts
//        $this->Acl->allow($group, 'controllers/Posts/add');
//        $this->Acl->deny($group, 'controllers/Posts/edit');
//
//        //we add an exit to avoid an ugly "missing views" error message
//        echo "all done";
//        exit;
//    }
    /**
     * login method
     *
     * @return void
     */
    function login() {
        $this->layout = 'login';
        
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirigir($this->Auth->User('group_id'));
            } else {
                $this->Session->setFlash('El usuario o contraseña ingresado son incorrectos.', 'error');
            }
        }
    }
    /**
     * logout method
     *
     * @return void
     */
    function logout() {
        
        $this->Session->setFlash('Se ha cerrado sesión correctamente', 'success');
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }    
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('title', __('Usuarios'));
        $this->set('description', __('Administracion de Usuarios'));
        
        $this->User->recursive = 1;
        $this->set('users', $this->paginate("User"));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'), 'error');
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->loadModel('AclManagement.User');
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario guardado con exito'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no se hace guardado correctamente. Por favor, vuelva a intentarlo.'), 'error');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido guardado correctamente'), 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El usuario no se hace guardado correctamente. Por favor, vuelva a intentarlo.'), 'error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $this->request->data['User']['password'] = null;
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario eliminado'), 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El usuario no se ha eliminado'), 'error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     *  Active/Inactive User
     *
     * @param <int> $user_id
     */
    public function toggle($user_id, $status) {
        $this->layout = "ajax";
        $status = ($status) ? 0 : 1;
        $this->set(compact('user_id', 'status'));
        if ($user_id) {
            $data['User'] = array('id'=>$user_id, 'status'=>$status);
            $allowed = $this->User->saveAll($data["User"], array('validate'=>false));           
        } 
    }
    
    public function agregar($usuario) {
        $this->loadModel('AclManagement.User');
        $this->User->create();
            if ($this->User->save($usuario)) {
                //$this->Session->setFlash('Usuario guardado con exito', 'success');
                return true;
                //$this->redirect(array('action' => 'index'));
            } else {
                //$this->Session->setFlash('El usuario no se hace guardado correctamente. Por favor, vuelva a intentarlo.', 'error');
                return false;
            }
    }
    
    public function redirigir($group){
        if($group == 1){
            $this->redirect($this->Auth->redirect('/pedidos/'));
        }
        else {   
            $this->redirect($this->Auth->redirect('/clientes/home'));
        }
    }

    
}
?>