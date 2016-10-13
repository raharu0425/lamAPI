<?php
/**
 * APIのレスポンスのクラス
 * インターフェース的なやつを上に作るべき？
 *
 */

class Response
{
    private $result = array();

    public function __construct($controller)
    {
        $this->result['url'] = $controller->request->here;
        $this->result['method'] = $controller->request->method();
        $this->result['entities'] = array();
    }

    public function addEntity(Entity $entity)
    {
        array_push($this->result['entities'], $entity->toArray());
    }

    public function getResult()
    {
        return $this->result;
    }

}
