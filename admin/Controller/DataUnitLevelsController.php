<?php
App::uses('AdminBaseImpoterController', 'Controller');
/**
 * AdminDataUnits Controller
 *
 * @property AdminDataUnit $AdminDataUnit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DataUnitLevelsController extends AdminBaseImpoterController {

    /**
     * 設定ファイル
     */
    //Dependecies
    public $model_names = array('DataUnitLevel');
    //CSVファイル名
    public $csv_file_name = "DataUnitLevel";
    //操作するマスター名
    public $display_model_name = 'DataUnitLevel';
    //パンくずリスト
    public $crumbs = array('マスター管理' => '/top/index', 'ユニットレベル管理' => '/DataUnitLevels/index');
    //スキップする最初の名前
    public $skip_waste = 'level';

    /**
     * CSVとDBカラムの紐付けフィールドの作成
     *
     * @access  public
     */
    public function getCsv4ColumFields()
    {
        //DBカラムとCSVのフィールドが同じ場合は調整する必要はない
        $db_column = array_keys($this->DataUnitLevel->getColumnTypes(false));

        $fields = array();
        foreach($db_column as $column){
            $fields[$column] = $column;
        }

        //個別設定CSVとファイルの形式が違う場合はここに記載する
        //$fields['image_name'] = 'image_name2';

        return $fields;
    }

    /**
     * 現在のレコードを取得
     *
     * @access  public
     */
    public function creatDisplayRows($dto)
    {
        //モデル名をセット
        $this->set('model_name', $this->display_model_name);

        //フィールドをセット
        $this->set('fields', $this->getCsv4ColumFields());

        //現在の配列を取得
        $row = $this->DataUnitLevel->find('first', array('conditions' => array($this->display_model_name . '.' . $this->skip_waste . ' = ' . $dto[$this->skip_waste])));

        //表示配列の作成
        if(!$row){
            array_push($this->display_rows['create'], array($this->display_model_name => $dto));
        }else{
            if($this->checkDiff($row[$this->display_model_name], $dto)){
                array_push($this->display_rows['edit'], array($this->display_model_name => $dto));
            }else{
                array_push($this->display_rows['default'], array($this->display_model_name => $dto));
            }
        }
    }

    /**
     * 現在のレコードを取得
     *
     * @access  public
     */
    public function dataSave($dto)
    {
        $this->DataUnitLevel->save(array($this->display_model_name => $dto));

    }
}
