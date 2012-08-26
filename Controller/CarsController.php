<?php
App::uses('AppController', 'Controller');
/**
 * Cars Controller
 *
 * @property Car $Car
 */
class CarsController extends AppController {
	
	var $helpers = array('AssetCompress.AssetCompress');
	
	public $components = array (
		'RequestHandler',
		'Backbone.Backbone'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Car->recursive = 0;
		$this->set('cars', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Car->id = $id;
		if (!$this->Car->exists()) {
			throw new NotFoundException(__('Invalid car'));
		}
		$this->set('car', $this->Car->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Car->create();
			if ($result = $this->Car->save($this->request->data)) {
				if (!$this->RequestHandler->isAjax()) {
					$this->Session->setFlash(__('The car has been saved'));
					$this->redirect(array('action' => 'index'));
				}
				$this->set('car', $result);
			} else {
				$this->Session->setFlash(__('The car could not be saved. Please, try again.'));
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
		$this->Car->id = $id;
		if (!$this->Car->exists()) {
			throw new NotFoundException(__('Invalid car'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Car->save($this->request->data)) {
				$this->Session->setFlash(__('The car has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The car could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Car->read(null, $id);
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
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			throw new MethodNotAllowedException();
		}
		$this->Car->id = $id;
		if (!$this->Car->exists()) {
			throw new NotFoundException(__('Invalid car'));
		}
		if ($this->Car->delete()) {
			$this->Session->setFlash(__('Car deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Car was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
