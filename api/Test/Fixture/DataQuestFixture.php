<?php
/**
 * DataQuest Fixture
 */
class DataQuestFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'data_quest';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'chapter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'chapter.id'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 128, 'collate' => 'utf8_general_ci', 'comment' => 'クエスト名', 'charset' => 'utf8'),
		'use_ap' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => true, 'comment' => '使用AP'),
		'sort' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'comment' => 'ソート'),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '経験値'),
		'money' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'マネー'),
		'next_quest_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '開放クエストID'),
		'rewards' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => '報酬', 'charset' => 'utf8'),
		'copper_weight' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'comment' => '銅箱確率'),
		'silver_weight' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'comment' => '銀箱確率'),
		'gold_weight' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'comment' => '金箱確率'),
		'copper_rewards' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => '銅箱報酬', 'charset' => 'utf8'),
		'silver_rewards' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => '銀箱報酬', 'charset' => 'utf8'),
		'gold_rewards' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => '金箱報酬', 'charset' => 'utf8'),
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
			'chapter_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'use_ap' => 1,
			'sort' => 1,
			'exp' => 1,
			'money' => 1,
			'next_quest_id' => 1,
			'rewards' => 'Lorem ipsum dolor sit amet',
			'copper_weight' => 1,
			'silver_weight' => 1,
			'gold_weight' => 1,
			'copper_rewards' => 'Lorem ipsum dolor sit amet',
			'silver_rewards' => 'Lorem ipsum dolor sit amet',
			'gold_rewards' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-29 14:41:15',
			'modified' => '2016-09-29 14:41:15'
		),
	);

}
