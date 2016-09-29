<?php

// アドミン側の設定ファイルを定義する

// Basic認証
$config['basicauth']['id'] = 'raharu';
$config['basicauth']['password'] = '19850425';

//マスター
$config['masters'] = array(
                        array('name' => 'ユニット管理', 'controller' => 'DataUnits', 'action' => 'index'),
                        array('name' => 'チャプター管理', 'controller' => 'DataChapters', 'action' => 'index'),
                        array('name' => 'クエスト管理', 'controller' => 'DataQuests', 'action' => 'index'),
                        array('name' => '拠点管理', 'controller' => 'DataCastals', 'action' => 'index'),
                        array('name' => 'プレイヤーレベル管理', 'controller' => 'DataPlayerLevels', 'action' => 'index'),
                        array('name' => 'ユニットレベル管理', 'controller' => 'DataUnitLevels', 'action' => 'index'),
                        array('name' => '拠点レベル管理', 'controller' => 'DataCastalLevels', 'action' => 'index'),
                    );
