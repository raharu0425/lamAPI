<?php
/**
 * DataUnit Fixture
 */
class DataUnitFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'data_unit';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'display_name' => array('type' => 'string', 'null' => false, 'length' => 128, 'collate' => 'utf8_general_ci', 'comment' => '表示名', 'charset' => 'utf8'),
		'automaton_name' => array('type' => 'string', 'null' => false, 'length' => 128, 'collate' => 'utf8_general_ci', 'comment' => '識別子名', 'charset' => 'utf8'),
		'maton_type' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => '種別', 'charset' => 'utf8'),
		'rarity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'comment' => 'レアリティ'),
		'rarity_param' => array('type' => 'float', 'null' => false, 'default' => '10000', 'unsigned' => true, 'comment' => 'レアリティ係数'),
		'smash' => array('type' => 'integer', 'null' => false, 'default' => '10000', 'length' => 5, 'unsigned' => true, 'comment' => '会心率'),
		'max_lv' => array('type' => 'integer', 'null' => false, 'default' => '255', 'length' => 3, 'unsigned' => true, 'comment' => 'maxレベル'),
		'hp' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'comment' => 'HP'),
		'hp_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'comment' => 'HP_MAX'),
		'attack' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '攻撃力'),
		'attack_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '攻撃力MAX'),
		'defense' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '防御力'),
		'defense_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '防御力MAX'),
		'speed' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '行動力'),
		'speed_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '行動力MAX'),
		'radius' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'comment' => '攻撃範囲'),
		'next_delay_time' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => true, 'comment' => '攻撃遅延時間'),
		'impact_time' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'comment' => '攻撃インパクトタイム'),
		'use_bp' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'comment' => '使用BP'),
		'respawn_time' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'comment' => 'リスポンタイム'),
		'sale_money' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '売却値'),
		'grow_point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => '成長Pt'),
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
			'display_name' => 'Lorem ipsum dolor sit amet',
			'automaton_name' => 'Lorem ipsum dolor sit amet',
			'maton_type' => 'Lorem ipsum dolor sit amet',
			'rarity' => 1,
			'rarity_param' => 1,
			'smash' => 1,
			'max_lv' => 1,
			'hp' => 1,
			'hp_max' => 1,
			'attack' => 1,
			'attack_max' => 1,
			'defense' => 1,
			'defense_max' => 1,
			'speed' => 1,
			'speed_max' => 1,
			'radius' => 1,
			'next_delay_time' => 1,
			'impact_time' => 1,
			'use_bp' => 1,
			'respawn_time' => 1,
			'sale_money' => 1,
			'grow_point' => 1,
			'created' => '2016-09-29 14:41:36',
			'modified' => '2016-09-29 14:41:36'
		),
	);

}
