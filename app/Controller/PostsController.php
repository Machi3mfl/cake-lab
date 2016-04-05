<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("index", "view");      
	}
/**
 * home method
 *
 * @return void
 */
	public function index() {
        $this->set('title', __('Posts'));        

		$this->paginate = array('order'=>array('Post.created' => 'DESC'));
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}
	
/**
 * index method
 *
 * @return void
 */
	public function manage() {
        $this->set('title', __('Post'));
        $this->set('description', __('Manage Post'));
		
		$this->paginate = array('order'=>array('Post.created' => 'DESC'));
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data["Post"]["user_id"] = $this->Auth->user("id");
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data["Post"]["user_id"] = $this->Auth->user("id");
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'), 'error');
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'), 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'), 'success');
		$this->redirect(array('action' => 'index'));
	}
}
