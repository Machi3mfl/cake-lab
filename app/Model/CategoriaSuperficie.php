<?php
App::uses('AppModel', 'Model');
/**
 * CategoriaSuperficy Model
 *
 * @property Categoria $Categoria
 * @property Superficie $Superficie
 */
class CategoriaSuperficy extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Superficie' => array(
			'className' => 'Superficie',
			'foreignKey' => 'superficie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $actsAs = array('Containable');
}
