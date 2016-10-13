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

    /*
     * 初期DTOを取得する
     */
    public function getDefaultDto(UserEntity $user)
    {
        $dto = $this->getBlankDto();
        $dto['user_id'] = $user->id;
        $dto['level'] = 1;
        $dto['ap'] = 30;
        $dto['ap_max'] = 30;
        $dto['ap_max_time'] = date("Y-m-d H:i:s");
        $dto['money'] = 1000;
        $dto['gem_payment'] = 0;
        $dto['gem_free'] = 0;
        $dto['exp'] = 0;
        $dto['castal_id'] = 1;

        return $dto;
    }

}
