<?php
App::uses('AppController', 'Controller');
App::uses('ClientesController', 'Controller');
App::uses('CopiasController','Controller');
App::uses('Upload','Model');
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
      $this->loadModel("Upload");
      $this->Pedido->id = $id;
      $uploads=array();
      if (!$this->Pedido->exists()) {
        throw new NotFoundException(__('Invalid pedido'));
      }
      $pedido=$this->Pedido->read(null, $id);
      foreach( $pedido['Copia'] as $copia){
        $upload=$this->Upload->read(null,$copia['upload_id']);
        array_push($uploads,$upload);
      }
      $this->set('pedido', $this->Pedido->read(null, $id));
      $this->set('uploads',$uploads);
    }

/**
 * add method
 *
 * @return void
 */
      public function setearModelos() {
      $categorias=$this->Upload->Copia->Producto->Categoria->find('list');
      $superficies=null;
      $tamanos=null;
      $this->set(compact('superficies','tamanos','categorias'));
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

    public function add(){
      $this->loadModel('Upload');
      $usuario=$this->Auth->user();
      $guardados=array();
      $files=array(); // PARA DESPUES : GUARDAR FILES TEMPORALES Y LUEGO GUARDAR EN BD - USAR TMP EN FORMULARIO
      $this->inicializarPedido();

      if (!empty($this->request->data)){ // SI HAY FILES EN REQUEST DATA
          foreach($this->request->data["Upload"]["photo"] as $file) { // por cada photo setea un file
            $this->Upload->set(array('photo' => $file));
            $photo = $this->Upload->data;
            $photo["Upload"]["pedido_id"]= $this->Session->read('pedido_id');
            $photo["Upload"]["photo_dir"]= $this->Session->read('pedido_id');
            $this->Upload->create();
            if ($this->Upload->save($photo)) { // guarda el file en BD
              $ultimo = $this->Upload->getLastInsertId(); //obtiene el ultimo id , para crear una pila
              array_push($guardados,$ultimo); //guarda en array los id files guardados
            }
          } /**** fin foreach ***/
        $imgs=$this->listarGuardados($guardados);
        if (!empty($this->Session->read('imagenes'))){ //SI YA HAY IMAGENES CARGADAS ,lee las imagenes de la session,las apila y guarda
          $ant = $this->Session->read('imagenes');
          foreach($imgs as $img) {
            array_push($ant, $img);
          }
          $this->Session->write('imagenes',$ant);
          $this->set('imgs',$ant);
          $this->set('cantidad',count($ant));
        }else{ // SI NO HAY IMAGENES CARGADAS -- solo guarda
          $this->Session->write('imagenes',$imgs);
          $this->set('imgs',$imgs);
        }
      $this->setearModelos();
    } elseif ($this->Session->check('imagenes')){ //Muestra si se recarga la pagina
        $this->set('imgs',$this->Session->read('imagenes'));
        $this->set('cantidad',count($this->Session->read('imagenes')));
        $this->setearModelos();
      }
    }


    public function inicializarPedido (){
      if (!$this->Session->check('pedido_id')){ /***********  Crear pedido id para guardar uploads en carpeta con id ********************/
        $this->Pedido->create();
        $this->Pedido->set(array("fecha"=>date("Y-m-d H:i:s"),"estado" => "Incompleto"));
        $this->Pedido->save();
        $this->Session->write('pedido_id',$this->Pedido->getLastInsertId());
      }
    }
    /*
     * public
     *
     * obtiene las imagenes cargadas en session
     * para mostrarlas si se recarga la pagina
     *
     * return array de Uploads
     */

    public function recargarFotosSubidas(){
      $img = $this->Session->read('imagenes');
      $this->set('imgs',$img);
      $this->set('cantidad',count($img));
      $this->setearModelos();
    }


// PONER EN UPLOAD CONTROLLER
    public function duplicarUpload(){
      $this->loadModel('Upload');
      $this->autoRender=false;
      $upload_id = $this->request->data['upload_id'];

      if (!empty($upload_id)){
        $upload = $this->Upload->find('first', array(
          "conditions" => array(
            'id' => $upload_id)
          )
        );

      $upload['Upload']['duplicado']=true;
      $this->agregarASession($upload);
      return json_encode($upload);
      }
    }

    public function agregarASession(array $upload){
      if($this->Session->check('imagenes')){
      $imgs = $this->Session->read('imagenes');
      array_push($imgs, $upload);
      $this->Session->write('imagenes',$imgs);
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
          $upload=$this->Upload->findById($id);
          $upload['Upload']['duplicado']=false;
          $result[]=$upload;
        }
        return $result;
      }
    }

    public function confirmar(){
      $pedido=$this->request->data["Pedido"];
      $copias=$this->request->data["Copias"];
      $uploads=$this->Session->read('imagenes');
      $pedido_id=$this->Session->read('pedido_id');
      $Copias= new CopiasController;
      if(!empty($pedido)){
        $pedido["fecha"]=date("Y-m-d H:i:s");//fecha del pedido
        if($this->Session->check('cliente_id')){
          $this->Pedido->set(array(
            "id"=> $pedido_id, "fecha"=>date("Y-m-d H:i:s"),"estado" => "Cargado", "cliente_id"=> $this->Session->read('cliente_id')
          ));
          $this->Pedido->save($pedido);
        }
        $Copias->guardarCopias($copias,$pedido_id);
        $this->Session->setFlash("Pedido guardado");
        $this->Session->delete('imagenes');
        $this->Session->delete('pedido_id');
        $this->Session->delete('cliente_id');
      }else{
        $this->Session->setFlash("No se ha podido guardar el pedido");
      }
    }

    public function testUpload(){
    $this->loadModel("Upload");
    $pila=array();
      if(!empty($this->request->data)){
        foreach($this->request->data["Upload"]["photo"]  as $index => $foto){
          $this->Upload->set(array("photo" => $foto));
          $upload=$this->Upload->data;
          array_push($pila,$upload);
        }
        $this->Session->write("files",$pila);
      }
      else{
        debug("request data vacio");
      }
    }

    public function guardar(){
    $this->loadModel("Upload");
    $files=array();
    if($this->Session->check("files")){
      $files=$this->Session->read("files");
      foreach($files as $file){
        $this->Upload->set(array("photo" => $file["Upload"]["photo"]));
        $arch=$this->Upload->data;
        $this->Upload->create();
        if($this->Upload->save($arch["Upload"])){
          $this->Session->setFlash("Archivo guardado.");
        }else{
          $this->Session->setFlash("Archivo falló.");
        }
        }
      }else{
        $this->Session->setFlash("Session vacio.");
      }


    }


}
