<?php
App::uses('DataUnit', 'Model');

/**
 * DataUnit Test Case
 */
class DataUnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_unit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataUnit = ClassRegistry::init('DataUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataUnit);

		parent::tearDown();
	}

}
