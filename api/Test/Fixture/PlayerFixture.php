<?php
/**
 * Player Fixture
 */
class PlayerFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'player';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'ユーザーID'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => true, 'comment' => 'レベル'),
		'ap' => array('type' => 'integer', 'null' => false, 'default' => '30', 'length' => 4, 'unsigned' => true, 'comment' => 'アクションPt'),
		'ap_max' => array('type' => 'integer', 'null' => false, 'default' => '30', 'length' => 4, 'unsigned' => true, 'comment' => 'アクションPtMAX'),
		'ap_max_time' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '最大アクションPt時間'),
		'money' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true, 'comment' => 'お金'),
		'gem_payment' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true, 'comment' => 'ジェム（課金）'),
		'gem_free' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true, 'comment' => 'ジェム（配布）'),
		'exp' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true, 'comment' => '経験値'),
		'castal_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => true, 'comment' => '拠点ID'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => 1,
			'level' => 1,
			'ap' => 1,
			'ap_max' => 1,
			'ap_max_time' => '2016-10-08 19:07:08',
			'money' => 1,
			'gem_payment' => 1,
			'gem_free' => 1,
			'exp' => 1,
			'castal_id' => 1,
			'created' => '2016-10-08 19:07:08',
			'modified' => '2016-10-08 19:07:08'
		),
	);

}
