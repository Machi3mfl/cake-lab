<?php
App::uses('SuperficieTamano', 'Model');

/**
 * SuperficieTamano Test Case
 *
 */
class SuperficieTamanoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.superficie_tamano',
		'app.superficie',
		'app.producto',
		'app.categoria',
		'app.categoria_superficy',
		'app.tamano',
		'app.precio',
		'app.lista'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SuperficieTamano = ClassRegistry::init('SuperficieTamano');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SuperficieTamano);

		parent::tearDown();
	}

}
