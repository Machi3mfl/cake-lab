<?php
App::uses('Superficy', 'Model');

/**
 * Superficy Test Case
 *
 */
class SuperficyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.superficy',
		'app.producto',
		'app.categoria',
		'app.superficie',
		'app.tamano'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Superficy = ClassRegistry::init('Superficy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Superficy);

		parent::tearDown();
	}

}
