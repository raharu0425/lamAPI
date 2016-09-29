<?php

// アドミン側の設定ファイルを定義する

// Basic認証
$config['basicauth']['id'] = 'raharu';
$config['basicauth']['password'] = '19850425';

//マスター
$config['masters'] = array(
                        array('name' => 'ユニット管理', 'controller' => 'AdminDataUnits', 'action' => 'index'),
                        array('name' => 'チャプター管理', 'controller' => 'AdminDataChapters', 'action' => 'index'),
                        array('name' => 'クエスト管理', 'controller' => 'AdminDataQuests', 'action' => 'index'),
                        array('name' => '拠点管理', 'controller' => 'AdminDataCastals', 'action' => 'index'),
                        array('name' => 'プレイヤーレベル管理', 'controller' => 'AdminDataPlayerLevels', 'action' => 'index'),
                        array('name' => 'ユニットレベル管理', 'controller' => 'AdminDataUnitLevels', 'action' => 'index'),
                        array('name' => '拠点レベル管理', 'controller' => 'AdminDataCastalLevels', 'action' => 'index'),
                    );
