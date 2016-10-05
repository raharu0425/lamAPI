<?php
App::uses('Table', 'Entity.ORM');
App::uses('Entity', 'Entity.ORM');
App::uses('TableRegistry', 'Entity.ORM');

/**
 *  Models
 *
 *  Author --many--> Post --one---> Image
 *                        --many--> Comment
 *                        --many--> Star (not Table)
 *
 */

class TestAppTable extends Table {

	public static function defaultConnectionName() {
		return 'test';
	}

}

class UsersTable extends TestAppTable {
}

class TestEntityModel extends Table {

	public $useTable = false;

	public function analyzeMethodName($method) {
		return $this->_analyzeMethodName($method);
	}

}

class Author extends TestEntityModel {

	public $name = 'Author';

	public $hasOne = [
		'Image' => [
			'className' => 'Image',
		],
	];

	public $hasMany = [
		'Post',
		'Comment' => [
			'className' => 'Comment',
		],
	];

}

class Post extends TestEntityModel {

	public $name = 'Post';

	public $belongsTo = [
		'Author',
	];

	public $hasOne = [
		'Image' => [
			'className' => 'Image',
		],
	];

	public $hasMany = [
		'Comment' => [
			'className' => 'Comment',
		],
		'Star' => [
			'className' => 'Star',
		],
	];

/**
 *  dummy implementation of find().
 */
	public function find($type = 'first', $query = []) {
		$result = null;

		$this->beforeFind($query);

		switch ($type) {
			case 'all':
				if (isset($query['result'])) {
					$result = $query['result'];
				} else {
					$result = SampleData::$arrayOfData;
				}
				break;

			case 'first':
				if (!empty($query['contain'])) {
					$result = SampleData::$associatedData;
				} else {
					$result = SampleData::$simpleData;
				}
				break;

			case 'count':
				$result = 3;
				break;
		}

		$result = $this->afterFind($result, true);

		return $result;
	}

}

class Image extends TestEntityModel {

	public $name = 'Image';

	public $belongsTo = [
		'Post',
	];

}

class Comment extends TestEntityModel {

	public $name = 'Comment';

	public $belongsTo = [
		'Post',
	];

}

class Star extends AppModel {

	public $name = 'Star';

	public $useTable = false;

	public $belongsTo = [
		'Post',
	];

}

/**
 *  Entities
 */

class AuthorEntity extends Entity {

}

class PostEntity extends Entity {

}

class CommentEntity extends Entity {

}

class SampleData {

	public static $simpleData = [
		'Post' => [
			'id' => 123,
			'title' => 'Hello',
		],
	];

	public static $associatedData = [
		'Post' => [
			'id' => 123,
			'title' => 'Hello',
			'author_id' => 345,
		],
		'Author' => [
			'id' => 345,
			'name' => 'Bob',
		],
		'Image' => [
			'id' => 234,
			'post_id' => 123,
			'path' => '/path/to/image.jpg',
		],
		'Comment' => [
			[
				'id' => 101,
				'post_id' => 123,
				'comment' => 'hello',
			],
			[
				'id' => 102,
				'post_id' => 123,
				'comment' => 'world',
			],
			[
				'id' => 103,
				'post_id' => 123,
				'comment' => 'again',
			],
		],
		'Star' => [
			[
				'id' => 201,
				'post_id' => 123,
				'point' => 1,
			],
			[
				'id' => 202,
				'post_id' => 123,
				'point' => 3,
			],
		],
	];

	public static $emptyHasManyData = [
		'Post' => [
			'id' => 123,
			'title' => 'Hello',
			'author_id' => 345,
		],
		'Comment' => [
		],
	];

	public static $arrayOfData = [
		[
			'Post' => [
				'id' => 123,
				'title' => 'Hello',
			],
		],
		[
			'Post' => [
				'id' => 124,
				'title' => 'world',
			],
		],
		[
			'Post' => [
				'id' => 125,
				'title' => 'again',
			],
		],
	];

}

/**
 *  Testcases
 */
class TableTest extends CakeTestCase {

/**
 * Handy variable containing the next primary key that will be inserted in the
 * users table
 *
 * @var int
 */
	public static $nextUserId = 5;

	public $fixtures = ['plugin.entity.user'];

	public function startTest($method) {
		$this->Post = ClassRegistry::init('Post');
		$this->Author = ClassRegistry::init('Author');
	}

	public function endTest($method) {
		unset($this->Post);
		unset($this->Author);
		ClassRegistry::flush();
	}

/**
 * Tests the table method
 *
 * @return void
 */
	public function testTableMethod() {
		$table = new Table(['table' => 'users']);
		$this->assertEquals('users', $table->table());

		$table = new UsersTable;
		$this->assertEquals('users', $table->table());

		$table = $this->getMockBuilder('Table')
				->setMethods(['find'])
				->setMockClassName('SpecialThingsTable')
				->getMock();
		$this->assertEquals('special_things', $table->table());

		$table = new Table(['alias' => 'LoveBoats']);
		$this->assertEquals('love_boats', $table->table());

		$table->table('other');
		$this->assertEquals('other', $table->table());
	}

/**
 * Tests the alias method
 *
 * @return void
 */
	public function testAliasMethod() {
		$table = new Table(['alias' => 'Users']);
		$this->assertEquals('User', $table->alias());

		$table = new Table(['table' => 'stuffs']);
		$this->assertEquals('stuff', $table->alias());

		$table = new UsersTable;
		$this->assertEquals('User', $table->alias());

		$table = $this->getMockBuilder('Table')
				->setMethods(['find'])
				->setMockClassName('SpecialThingTable')
				->getMock();
		$this->assertEquals('SpecialThing', $table->alias());

		$table->alias('AnotherOne');
		$this->assertEquals('AnotherOne', $table->alias());
	}

/**
 * Tests primaryKey method
 *
 * @return void
 */
	public function testPrimaryKey() {
		$table = new Table([
			'table' => 'users',
			'schema' => [
				'id' => ['type' => 'integer'],
				'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
			]
		]);
		$this->assertEquals('id', $table->primaryKey());
		$table->primaryKey('thingID');
		$this->assertEquals('thingID', $table->primaryKey());

		$table->primaryKey(['thingID', 'user_id']);
		$this->assertEquals(['thingID', 'user_id'], $table->primaryKey());
	}

/**
 * Tests that name will be selected as a displayField
 *
 * @return void
 */
	public function testDisplayFieldName() {
		$table = new Table([
			'table' => 'users',
			'schema' => [
				'foo' => ['type' => 'string'],
				'name' => ['type' => 'string']
			]
		]);
		$this->assertEquals('name', $table->displayField());
	}
/**
 * Tests that no displayField will fallback to primary key
 *
 * @return void
 */
	public function testDisplayFallback() {
		$table = new Table([
			'table' => 'users',
			'schema' => [
				'id' => ['type' => 'string'],
				'foo' => ['type' => 'string'],
				'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
			]
		]);
		$this->assertEquals('id', $table->displayField());
	}

/**
 * Tests that displayField can be changed
 *
 * @return void
 */
	public function testDisplaySet() {
		$table = new Table([
			'table' => 'users',
			'schema' => [
				'id' => ['type' => 'string'],
				'foo' => ['type' => 'string'],
				'_constraints' => ['primary' => ['type' => 'primary', 'columns' => ['id']]]
			]
		]);
		$this->assertEquals('id', $table->displayField());
		$table->displayField('foo');
		$this->assertEquals('foo', $table->displayField());
	}

/**
 * Tests that recently fetched entities are marked as not new
 *
 * @return void
 */
	public function testFindPersistedEntities() {
		$table = TableRegistry::get('users');
		$table->entity = true;
		$results = $table->find('all');
		$this->assertCount(4, $results);
		foreach ($results as $article) {
			$this->assertFalse($article->isNew());
		}
	}

/**
 * Tests the exists function
 *
 * @return void
 */
	public function testExists() {
		$table = TableRegistry::get('users');
		$this->assertTrue($table->exists(['id' => 1]));
		$this->assertFalse($table->exists(['id' => 501]));
		$this->assertTrue($table->exists(['id' => 3, 'username' => 'larry']));
	}

/**
 * Tests that it is possible to insert a new row using the save method
 *
 * @group save
 * @return void
 */
	public function testSaveNewEntity() {
		$entity = new Entity([
			'username' => 'superuser',
			'password' => 'root',
			'created' => self::date(),
			'updated' => self::date(),
		], ['className' => 'UserEntity']);

		$table = TableRegistry::get('users');
		$this->assertSame($entity, $table->save($entity));
		$this->assertEquals(self::$nextUserId, $entity->id);

		$row = $table->find('first', [
			'conditions' => ['id' => self::$nextUserId],
			'entity' => true,
		]);
		$this->assertEquals($entity->toArray(), $row->toArray());
	}

/**
 * Test that saving a new empty entity does nothing.
 *
 * @group save
 * @return void
 */
	public function testSaveNewEmptyEntity() {
		$entity = new Entity([], ['className' => 'UserEntity']);
		$table = TableRegistry::get('users');
		$this->assertFalse($table->save($entity));
	}

/**
 * Tests that saving an entity will filter out properties that
 * are not present in the table schema when saving
 *
 * @group save
 * @return void
 */
	public function testSaveEntityOnlySchemaFields() {
		$entity = new Entity([
			'username' => 'superuser',
			'password' => 'root',
			'crazyness' => 'super crazy value',
			'created' => self::date(),
			'updated' => self::date(),
		], ['className' => 'UserEntity']);
		$table = TableRegistry::get('users');
		$this->assertSame($entity, $table->save($entity));
		$this->assertEquals($entity->id, self::$nextUserId);

		$row = $table->find('first', [
			'conditions' => ['id' => self::$nextUserId],
			'entity' => true,
		]);
		$entity->unsetProperty('crazyness');
		$this->assertEquals($entity->toArray(), $row->toArray());
	}

	public function testEntityCreation() {
		// 1. create entity. It must be instance of PostEntity.
		$s1 = $this->Post->newEntity([]);
		$this->assertTrue(is_a($s1, 'PostEntity'));

		// 2. create entity with data. Properties can be accessed.
		$s2 = $this->Post->newEntity(SampleData::$simpleData);
		$this->assertTrue(is_a($s2, 'PostEntity'));
		$this->assertEqual($s2->get('id'), 123);
		$this->assertEqual($s2->get('title'), 'Hello');

		// 3. create entity with complex data.
		$s3 = $this->Post->newEntity(SampleData::$associatedData);

		// 3a. ensure object is PostEntity.
		$this->assertTrue(is_a($s3, 'PostEntity'));
		$this->assertEqual($s2->get('id'), 123);
		$this->assertEqual($s2->get('title'), 'Hello');

		// 3b. belongsTo association.
		$this->assertTrue(is_a($s3->get('Author'), 'AuthorEntity'));
		$this->assertEqual($s3->get('Author')->get('id'), 345);
		$this->assertEqual($s3->get('Author')->get('name'), 'Bob');

		// 3c. hasOne association. Entity has no specific class.
		$this->assertTrue(is_a($s3->get('Image'), 'Entity'));
		$this->assertEqual($s3->get('Image')->get('id'), 234);

		// 3d. hasMany association.
		$this->assertEqual(count($s3->get('Comment')), 3);
		$this->assertTrue(is_a($s3->get('Comment')[0], 'CommentEntity'));
		$this->assertEqual($s3->get('Comment')[0]->get('comment'), 'hello');

		// 3e. hasMany association (not Table).
		$this->assertEqual(count($s3->get('Star')), 2);
		$this->assertTrue(is_array($s3->get('Star')[0]));
		$this->assertEqual($s3->get('Star')[0]['point'], 1);
	}

	public function testCreateEntityWithEmptyHasMany() {
		// 4. create entity with complex data.
		$s = $this->Post->newEntity(SampleData::$emptyHasManyData);

		$this->assertNotNull($s->get('Comment'));
		$this->assertTrue(is_array($s->get('Comment')));
		$this->assertEqual(count($s->get('Comment')), 0);
	}

	public function testFind() {
		// 1. Test emulated find()
		$this->Post->entity(false);
		$result = $this->Post->find('first');
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['Post']['title'], 'Hello');

		// 2. OK, let's roll.
		$s1 = $this->Post->find('first', ['entity' => true]);
		$this->assertTrue(is_a($s1, 'PostEntity'));

		// 3. find all.
		$result = $this->Post->find('all', ['entity' => true]);
		$this->assertTrue(is_array($result));
		$this->assertEqual(count($result), 3);
		$this->assertTrue(is_a($result[0], 'PostEntity'));
		$this->assertEqual($result[2]->title, 'again');

		// 4. find all with empty result.
		$result = $this->Post->find('all', [
			'entity' => true,
			'result' => [],
		]);
		$this->assertTrue(is_array($result));
		$this->assertEqual(count($result), 0);
	}

	public function testFetchEntities() {
		// 1. entities is shortcut for
		// find('all') with entitiy => true.
		$result = $this->Post->entities();
		$this->assertTrue(is_array($result));
		$this->assertEqual(count($result), 3);
		$this->assertTrue(is_a($result[0], 'PostEntity'));
		$this->assertEqual($result[2]->title, 'again');

		// 2. allEntities is alias for entities.

		$result = $this->Post->allEntities();
		$this->assertTrue(is_array($result));
		$this->assertEqual(count($result), 3);
		$this->assertTrue(is_a($result[0], 'PostEntity'));
		$this->assertEqual($result[2]->title, 'again');
	}

	public function testMagicFetch() {
		// 1. entitesByName
		$result = $this->Post->analyzeMethodName('entitiesByName');
		$this->assertTrue($result[0]);
		$this->assertEqual($result[1], 'findAllByName');

		// 2. allEntitesByName
		$result = $this->Post->analyzeMethodName('allEntitiesByName');
		$this->assertTrue($result[0]);
		$this->assertEqual($result[1], 'findAllByName');

		// 3. entityByName
		$result = $this->Post->analyzeMethodName('entityByName');
		$this->assertTrue($result[0]);
		$this->assertEqual($result[1], 'findByName');

		// 4. findByName
		$result = $this->Post->analyzeMethodName('findByName');
		$this->assertFalse($result[0]);
		$this->assertEqual($result[1], 'findByName');
	}

	public function testEntityArrayAccess() {
		$s = $this->Post->newEntity([]);

		// 1. Simple array access.
		$s->name = 'Hello';
		$this->assertTrue(isset($s->name));
		$this->assertTrue(isset($s['name']));
		$this->assertEqual($s['name'], 'Hello');

		// 2. Non-exist property is not exists.
		$this->assertFalse(isset($s->foobar));
		$this->assertFalse(isset($s['foobar']));

		// 3. Set by array access.
		$s['title'] = 'World';
		$this->assertEqual($s['title'], 'World');
		$this->assertEqual($s->title, 'World');

		// 4. Unset by array access.
		unset($s['title']);
		$this->assertFalse(isset($s['title']));
		$this->assertFalse(isset($s->title));

		// 5. property start with '_' cannot by access;
		$s->_foo = 'Bar';
		$this->assertFalse(isset($s['_foor']));
	}

/**
 *  For convenience at debug time, entity is converted into html
 *  when it used as string.
 */
	public function testStringReplesentationOfEntity() {
		$a = $this->Author->newEntity([]);

		// 1. empty entity
		$expected = '<div class="AuthorEntity"></div>';
		$this->assertEqual(strval($a), $expected);

		// 2. assign entity
		$a->name = 'Basuke';

		$expected = '<div class="AuthorEntity"><strong class="key">name</strong><span clas="value">Basuke</span></div>';
		$this->assertEqual(strval($a), $expected);

		// 3. value must be html escaped
		$a->job = "<b>Programmer</b>";

		$expected = '<div class="AuthorEntity"><strong class="key">name</strong><span clas="value">Basuke</span><strong class="key">job</strong><span clas="value">&lt;b&gt;Programmer&lt;/b&gt;</span></div>';
		$this->assertEqual(strval($a), $expected);
	}

/**
 * Entity can be converted to model-aware data array.
 */
	public function testEntityToArray() {
		// 1. simple data
		$data = [
			'Author' => [
				'name' => 'Basuke',
				'programmer' => 'Programmer',
			],
		];

		$author = $this->Author->newEntity($data);
		$reversed = $author->toArray();
		$this->assertEqual($reversed, $data);

		// 2. has many
		$data = [
			'Author' => [
				'id' => '123',
				'name' => 'Basuke',
				'programmer' => 'Programmer',
			],
			'Comment' => [
				[
					'id' => '1',
					'author_id' => '123',
					'comment' => 'Hello',
				],
				[
					'id' => '2',
					'author_id' => '123',
					'comment' => 'World',
				],
			],
		];

		$author = $this->Author->newEntity($data);
		$reversed = $author->toArray();
		$this->assertEqual($reversed, $data);

		// 3. has one
		$data = [
			'Author' => [
				'id' => '123',
				'name' => 'Basuke',
				'programmer' => 'Programmer',
			],
			'Image' => [
				'id' => '1',
				'author_id' => '123',
				'url' => 'Hello',
			],
		];

		$author = $this->Author->newEntity($data);
		$reversed = $author->toArray();
		$this->assertEqual($reversed, $data);
	}

}
