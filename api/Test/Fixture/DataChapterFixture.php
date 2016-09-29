<?php
/**
 * DataChapter Fixture
 */
class DataChapterFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'data_chapter';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => 'チャプター名', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => '種別', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '説明文', 'charset' => 'utf8'),
		'image_name' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => '背景識別子', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image_name' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-29 14:40:24',
			'modified' => '2016-09-29 14:40:24'
		),
	);

}
