<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 * @property CategoriaSuperficy $CategoriaSuperficy
 * @property Producto $Producto
 * @property Superficie $Superficie
 */
class Categoria extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

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
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'categoria_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
        /*
	public $hasAndBelongsToMany = array(
		'Superficie' => array(
			'className' => 'Superficie',
			'joinTable' => 'categoria_superficies',
			'foreignKey' => 'categoria_id',
			'associationForeignKey' => 'superficie_id',
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
         * 
         */
	public $actsAs = array('Containable');
}
