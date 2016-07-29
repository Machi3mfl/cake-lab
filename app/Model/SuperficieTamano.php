<?php
App::uses('AppModel', 'Model');
/**
 * SuperficieTamano Model
 *
 * @property Superficie $Superficie
 * @property Tamano $Tamano
 */
class SuperficieTamano extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

        public $validate = array(
            'tipo' => 'notEmpty'
        );
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Superficie' => array(
			'className' => 'Superficie',
			'foreignKey' => 'superficie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tamano' => array(
			'className' => 'Tamano',
			'foreignKey' => 'tamano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
