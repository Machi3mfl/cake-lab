<?php
App::uses('AppController', 'Controller');
App::uses('ClientesController', 'Controller');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 */
class PedidosController extends AppController {
/**
 * index method
 *
 * @return void
 */
    public function index() {
            $this->Pedido->recursive = 0;
            $this->set('pedidos', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
            $this->Pedido->id = $id;
            if (!$this->Pedido->exists()) {
                    throw new NotFoundException(__('Invalid pedido'));
            }
            $this->set('pedido', $this->Pedido->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->loadModel('Upload');
        $usuario=$this->Auth->user();
        //$this->Session->delete('imagenes');
        if (!empty($this->request->data)){
            //debug($this->request->data);
            foreach($this->request->data["Upload"]["photo"] as $file) {
                $this->Upload->set(array('photo' => $file));
                $photo = $this->Upload->data;
                $this->Upload->create();
                if ($this->Upload->save($photo)) {
                    $ultimo = $this->Upload->getLastInsertId();
                    $guardados[]= $ultimo;
                }
            }
            $imgs=$this->listarGuardados($guardados);
            if (!empty($this->Session->read('imagenes'))){
                $ant = $this->Session->read('imagenes');
                foreach($imgs as $img) {
                    array_push($ant, $img);
                }
                $this->Session->write('imagenes',$ant);
                $this->set('imgs',$ant); 
                $this->set('cantidad',count($ant));
                //debug($ant);
            }
            else{
                $this->Session->write('imagenes',$imgs);  
                $this->set('imgs',$imgs); 
            }
        $this->setearModelos();
        }else{
            if($this->Session->check('imagenes')){
                $img = $this->Session->read('imagenes');
                $this->set('imgs',$img); 
                $this->set('cantidad',count($img));
                $this->setearModelos();
            }
        }
    }
    
    public function setearModelos(){
        $categorias=$this->Upload->Copia->Producto->Categoria->find('list');
        $superficies=$this->Upload->Copia->Producto->Superficie->find('list');
        $tamanos=$this->Upload->Copia->Producto->Tamano->find('list');
        $this->set(compact('superficies','tamanos','categorias'));
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
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists()) {
                throw new NotFoundException(__('Invalid pedido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Pedido->save($this->request->data)) {
                        $this->Session->setFlash(__('The pedido has been saved'));
                        $this->redirect(array('action' => 'index'));
                } else {
                        $this->Session->setFlash(__('The pedido could not be saved. Please, try again.'));
                }
        } else {
                $this->request->data = $this->Pedido->read(null, $id);
        }
        $clientes = $this->Pedido->Cliente->find('list');
        $this->set(compact('clientes'));
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
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists()) {
                throw new NotFoundException(__('Invalid pedido'));
        }
        if ($this->Pedido->delete()) {
                $this->Session->setFlash(__('Pedido deleted'));
                $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pedido was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function nuevo(){
        $this->loadModel('Upload');
        $this->layout='front';
        $usuario=$this->Auth->user();
        if($this->Session->check('imagenes')){
            $img = $this->Session->read('imagenes');
            $this->set('imgs',$img); 
            $this->set('cantidad',count($img));
            $this->setearModelos();
        }
        $this->Session->delete('imagenes');
        if (!empty($this->request->data)){
            //debug($this->request->data);
            foreach($this->request->data["Upload"]["photo"] as $file) {
                $this->Upload->set(array('photo' => $file));
                $photo = $this->Upload->data;
                $this->Upload->create();
                if ($this->Upload->save($photo)) {
                    $ultimo = $this->Upload->getLastInsertId();
                    $guardados[]= $ultimo;
                }
            }
            $imgs=$this->listarGuardados($guardados);
            if (!empty($this->Session->read('imagenes'))){
                $ant = $this->Session->read('imagenes');
                foreach($imgs as $img) {
                    array_push($ant, $img);
                }
                $this->Session->write('imagenes',$ant);
                $this->set('imgs',$ant); 
                $this->set('cantidad',count($ant));
            }
            else{
                $this->Session->write('imagenes',$imgs);  
                $this->set('imgs',$imgs); 
            }
        $this->setearModelos();
        }
    }
    
    public function confirmar(){
        debug($this->request->data);
        
    }

}
