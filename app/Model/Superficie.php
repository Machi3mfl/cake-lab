<?php
App::uses('AppModel', 'Model');
/**
 * Superficy Model
 *
 * @property Producto $productos
 */
class Superficie extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tipo';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'superficie_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $hasAndBelongsToMany = array(
		'Tamano' => array(
			'className' => 'Tamano',
			'joinTable' => 'superficie_tamanos',
			'foreignKey' => 'superficie_id',
			'associationForeignKey' => 'tamano_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	public $actsAs = array('Containable');
}
