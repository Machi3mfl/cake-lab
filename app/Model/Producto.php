<?php
App::uses('AppModel', 'Model');
/**
 * Producto Model
 *
 * @property Categoria $Categoria
 * @property Superficie $Superficie
 * @property Tamano $Tamano
 */
class Producto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

        public $validate = array(
												'activo' => array(
															'rule' => array('checkExistencia'),
															'message' => 'Ya existe un producto con estas caracteristicas. No pueden existir productos iguales.'
												),
                        'categoria_id' => array(
                                'notEmpty' => array(
                                        'rule' => array('notEmpty')
                                ),
                        ),
                        'superficie_id' => array(
                                'notEmpty' => array(
                                        'rule' => array('notEmpty')
                                ),
                        ),
                        'tamano_id' => array(
                                'notEmpty' => array(
                                        'rule' => array('notEmpty')
                                ),
                        ),
            );
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
		),
		'Tamano' => array(
			'className' => 'Tamano',
			'foreignKey' => 'tamano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public $hasMany = array(
		'precios' => array(
			'className' => 'Precio',
			'foreignKey' => 'producto_id',
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

	public $actsAs = array('Containable');

	public function checkExistencia($data){
		$prod = $this->find('first', array(
			'conditions' => array(
				'Producto.categoria_id' => $this->data['Producto']['categoria_id'] ,
				'Producto.superficie_id' => $this->data['Producto']['superficie_id'] ,
				'Producto.tamano_id' => $this->data['Producto']['tamano_id']
			)
		));

		if (!$prod) return true;
		else return false;
	}

}
