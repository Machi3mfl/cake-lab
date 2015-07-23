<?php
/**
 * SuperficieTamanoFixture
 *
 */
class SuperficieTamanoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'superficie_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'index'),
		'tamano_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'superficie_id' => array('column' => array('superficie_id', 'tamano_id'), 'unique' => 1),
			'superficie_tamano_tamano_fk' => array('column' => 'tamano_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'superficie_id' => 1,
			'tamano_id' => 1
		),
	);

}
