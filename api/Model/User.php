<?php
App::uses('Table', 'Entity.ORM');
App::uses('UserEntity', 'Model/Entity');
/**
 * User Model
 *
 */
class User extends Table {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
