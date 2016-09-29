<?php
App::uses('AdminAppController', 'Controller');
/**
 * AdminBaseImpoter Controller
 *
 * @property AdminBaseImpoter $AdminBaseImpoter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AdminBaseImpoterController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash', 'FileProcessor');

    /**
     * properties
     */
    public $id_array = array();
    public $messages = array();
    public $uploaddir = '/files/';
    public $render = '/AdminBaseImpoter/overview';
    public $skip_waste = 'id';
    public $enbale_import = false;

    //表示用
    public $display_rows = array('default' => [], 'create' => [], 'edit' => [], 'delete' => []);

    /**
     * インポートアクションの初期化
     *
     * @access public
     */
    public function init()
    {
        //ファイルコンポーネント初期化
        $this->FileProcessor->init(null, $this->uploaddir, $this->getFileName());
        $this->set('last_update_time', $this->FileProcessor->getFileUploadTime());

        //パンくずセット
        $this->set('crumbs', $this->crumbs);

        //ModelLoad
        $this->loadModel(join(',', $this->model_names));
    }

    /**
     * indexアクション
     */
    public function index()
    {
        //初期化
        $this->init();

        //ファイルアップロード
        if($this->request->data('upload_do')){
            $this->csvFormatCheck();
            if(empty($this->messages['error'])){
                $this->fileupload();
            }
        }

        //差分チェック
        if($this->request->data('diff_do')){
            $this->datacheck();
        }

        //インポート
        if($this->request->data('import_do')){
            $this->execute();
        }

        $this->set('messages', $this->messages);
        $this->set('enbale_import', $this->enbale_import);
        $this->render($this->render);
    }

    /*
     * CSVファイルアップロード
     *
     * @access public
     */
    public function fileupload()
    {
        //初期化
        $this->FileProcessor->init($_FILES['upfile'], $this->uploaddir, $this->getFileName());

        //アップロード
        if(!$this->FileProcessor->enablePostFile()){
            $this->messages['error'][] = 'エラー：ファイルをアップロードしてください';
        }else{
            if(!$this->FileProcessor->upload()) {
                $this->messages['error'][] = "エラー：CSVのアップロードに失敗しました";
            }else{
                $this->messages['success'][] = "成功：" . $this->FileProcessor->getUploadPath() . "ファイルをアップロードしました";
                //最終更新日時
                $this->set('last_update_time', $this->FileProcessor->getFileUploadTime());
            }
        }

        if(empty($this->messages['error'])){
            return true;
        }
    }

    /*
     * ファイルチェック
     *
     * @access public
     */
    public function csvFormatCheck()
    {
        //ハンドラとフィールドKeyの取得
        $handle = fopen($_FILES['upfile']['tmp_name'], 'r');
        $keys = $this->FileProcessor->skipWaste($handle, $this->skip_waste);
        $fields = $this->getCsv4ColumFields();
        $relation = $this->FileProcessor->getRelation($keys, $fields);

        foreach($fields as $key => $value){
            if(!in_array($key, $relation)){
                $this->messages['error'][] = 'CSV形式が合いません、CSVフィールドに「' . $value . '」があるか確認してください';
            }
        }
    }

    /*
     * ファイルチェック
     *
     * @access public
     */
    public function datacheck()
    {
        if(!$this->FileProcessor->isFileExist()){
            $this->messages['error'][] = 'エラー：ファイルをアップロードしてください';
            return;
        }

        //ハンドラとフィールドKeyの取得
        $handle = $this->FileProcessor->getHandle();
        $keys = $this->FileProcessor->skipWaste($handle, $this->skip_waste);
        $relation = $this->FileProcessor->getRelation($keys, $this->getCsv4ColumFields());

        while($values = fgetcsv($handle)){

            //コンバート
            $dto = $this->convertDto($values, $relation);
            if(!isset($dto[$this->skip_waste])) break;

            //バリデーション
            $this->checkParameter($dto);

            //差分テーブルの作成
            $this->creatDisplayRows($dto);

            //セット
            $this->set('display_rows', $this->display_rows);
        }

        //エラーがなければ
        if(empty($this->messages['error'])){
            $this->enbale_import = true;
        }
    }

    /*
     * インポート実行
     *
     * @access public
     */
    public function execute()
    {
        //ハンドラとフィールドKeyの取得
        $handle = $this->FileProcessor->getHandle();
        $keys = $this->FileProcessor->skipWaste($handle, $this->skip_waste);
        $relation = $this->FileProcessor->getRelation($keys, $this->getCsv4ColumFields());

        while($values = fgetcsv($handle)){

            //コンバート
            $dto = $this->convertDto($values, $relation);
            if(!isset($dto[$this->skip_waste])) break;

            //データの保存
            $this->dataSave($dto);

            //差分テーブルの作成
            $this->creatDisplayRows($dto);

            //セット
            $this->set('display_rows', $this->display_rows);
        }

    }

    /**
     * データ整理
     *
     * @return  array
     */
    public function convertDto($values, $relation)
    {
        $dto = array();
        foreach($relation as $n => $key){
            $value = $values[$n];
            switch($key){
            default:
                $dto[$key] = $value;
                break;
            }
        }
        return $dto;
    }

    /**
     * パラメータのバリデーション
     *
     * @return  array
     */
    public function checkParameter($dto)
    {
        foreach($dto as $key => $value){
            switch($key){
                case 'id' :
                    //ID重複チェック
                    if(isset($this->id_array[$dto[$key]])){
                        $this->messages['error'][] = sprintf('ID%dの%sが重複しています', $dto[$key], $key, $value);
                    }else{
                        $this->id_array[$dto[$key]] = true;
                    }
                    break;
            }
        }
    }

    /**
     * 差分チェック
     *
     * @return  array
     */
    public function checkDiff($rows, &$dto)
    {
        $is_diff = false;

        foreach($rows as $col => $val){
            if(isset($dto[$col]) && $dto[$col] != $val){
                $dto[$col] = sprintf('%s -> %s', $val, $dto[$col]);
                $is_diff = true;
            }
        }

        return $is_diff;
    }


    /**
     * CSVとDBカラムの紐付けフィールドの作成
     *
     * @access  public
     */
    public function getCsv4ColumFields(){
        return array();
    }


    /**
     * ファイルネームを取得
     *
     * @access  public
     */
    public function getFileName()
    {
        return 'master.import.' . $this->csv_file_name . '.csv';
    }

}
