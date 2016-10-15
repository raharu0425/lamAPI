<?php
/**
 * APIのレスポンスのクラス
 * インターフェース的なやつを上に作るべき？
 *
 */

class Response
{
    // 結果値
    private $result = array();

    public function __construct($controller)
    {
        $this->result['url'] = $controller->request->here;
        $this->result['method'] = $controller->request->method();
        $this->result['entities'] = array();
    }

    /**
     * 結果にエンティティを追加
     */
    public function addEntity(Entity $entity)
    {
        array_push($this->result['entities'], $entity->toArray());
    }

    /**
     * 結果の取得
     */
    public function getResult()
    {
        return $this->result;
    }

}
