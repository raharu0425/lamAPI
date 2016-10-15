<?php
class CreateTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create_table';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'data_castal' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => '名前', 'charset' => 'utf8'),
					'durability' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => true, 'comment' => '耐久度'),
					'storage_bp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'BP貯蓄量'),
					'storage_bp_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'BP貯蓄量MAX'),
					'default_storage_bp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '初期BP'),
					'default_storage_bp_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '初期BPMAX'),
					'create_bp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => true, 'comment' => 'BP生産量'),
					'create_bp_max' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => true, 'comment' => 'BP生産量MAX'),
					'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '説明', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_castal_level' => array(
					'level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => true, 'comment' => 'レベル'),
					'need_point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '必要Pt'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_chapter' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'length' => 256, 'collate' => 'utf8_general_ci', 'comment' => 'チャプター名', 'charset' => 'utf8'),
					'type' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => '種別', 'charset' => 'utf8'),
					'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '説明文', 'charset' => 'utf8'),
					'image_name' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => '背景識別子', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_player_level' => array(
					'level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary', 'comment' => 'レベル'),
					'prev_exp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '必要経験値'),
					'need_exp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '次のレベルの経験値'),
					'ap' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true, 'comment' => 'ap'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'level', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_quest' => array(
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
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_unit' => array(
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
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'data_unit_level' => array(
					'level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary', 'comment' => 'レベル'),
					'prev_exp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '必要経験値'),
					'need_exp' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => '次に必要な経験値'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'level', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'player' => array(
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
						'user_id' => array('column' => 'user_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'user' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'hash' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'last_takeover' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '最終引き継ぎ日時'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'name_index' => array('column' => 'name', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'data_castal', 'data_castal_level', 'data_chapter', 'data_player_level', 'data_quest', 'data_unit', 'data_unit_level', 'player', 'user'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
