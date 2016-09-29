<?php
App::uses('DataQuest', 'Model');

/**
 * DataQuest Test Case
 */
class DataQuestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_quest'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataQuest = ClassRegistry::init('DataQuest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataQuest);

		parent::tearDown();
	}

}
