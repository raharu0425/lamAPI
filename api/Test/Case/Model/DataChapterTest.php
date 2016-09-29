<?php
App::uses('DataChapter', 'Model');

/**
 * DataChapter Test Case
 */
class DataChapterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_chapter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataChapter = ClassRegistry::init('DataChapter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataChapter);

		parent::tearDown();
	}

}
