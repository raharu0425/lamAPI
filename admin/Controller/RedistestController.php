<?php
/**
 * Redisの確認用クラス
 */
class RedistestController extends AppController
{

    public $autoRender = false;

    /**
     * RedisAPIの使い方を載せる
     */
    public function index()
    {
        var_dump('Heloo!! Redis test Class!');
        $key = 'test_key3';
        if (!$data = Cache::read($key)) {
            Cache::write($key, array('caketest' => 'hogeihogehoge'));
        }
    }




}

