<?php
App::uses('AppModel', 'Model');
/**
 * Precio Model
 *
 * @property Lista $lista
 * @property Producto $productos
 */
class Precio extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'precio';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'lista' => array(
			'className' => 'Lista',
			'foreignKey' => 'lista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'productos' => array(
			'className' => 'Producto',
			'foreignKey' => 'producto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
