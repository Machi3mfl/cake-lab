<?php
App::uses('AppModel', 'Model');
/**
 * Tamano Model
 *
 * @property Producto $Producto
 */
class Tamano extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tamano';

        public $validate = array(
            'tamano' => 'notEmpty'
        );
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'tamano_id',
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
