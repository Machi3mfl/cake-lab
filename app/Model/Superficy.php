<?php
App::uses('AppModel', 'Model');
/**
 * Superficy Model
 *
 * @property Producto $producto
 */
class Superficy extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tipo';

        public $validate = array(
            'tipo' => 'notEmpty'
        );
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

}
