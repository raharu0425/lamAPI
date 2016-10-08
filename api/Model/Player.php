<?php
App::uses('Table', 'Entity.ORM');
App::uses('PlayerEntity', 'Model/Entity');
/**
 * Player Model
 *
 */
class Player extends Table {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'player';

}
