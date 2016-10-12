<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * @Override
     * getColumnTypes
     *
     */
    public function getColumnTypes($get_reserve_coulum = true)
    {
        if($get_reserve_coulum) return parent::getColumnTypes();

        $coulum_types = parent::getColumnTypes();
        if(isset($coulum_types['created'])){
            unset($coulum_types['created']);
        }
        if(isset($coulum_types['modified'])){
            unset($coulum_types['modified']);
        }

        return $coulum_types;
    }

    /**
     * モデルの空配列を返します。
     * @return array モデルの空配列
     */
    public function getBlankDto()
    {
        //カラムタイプの配列からキーのみを取得
        $keys = array_keys($this->getColumnTypes());
        //配列を空文字で埋める
        $arr = array_fill_keys($keys,'');

        //不必要なカラムはunset
        if(isset($arr['created'])){
            unset($arr['created']);
        }
        if(isset($arr['modified'])){
            unset($arr['modified']);
        }

        return $arr;
    }

    public function begin()
    {
        $this->getDataSource()->begin();
    }
    public function commit()
    {
        $this->getDataSource()->commit();
    }
    public function rollback()
    {
        $this->getDataSource()->rollback();
    }

}
