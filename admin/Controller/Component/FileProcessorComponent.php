<?php
/**
 * FileProcessor Component
 * ファイル操作のコンポーネント
 */

class FileProcessorComponent extends Component {

    /**
     * @prperties
     */
    public $org_file;               //オリジナルファイル
    public $upload_dir;             //アップロードディレクトリ
    public $upload_file_name;       //ファイル名

    /**
     * 初期化する
     *
     * @access  public
     */
    public function init($file = null, $dir = '/', $file_name = 'default.txt')
    {
        $this->org_file = $file;
        $this->upload_dir = $dir;
        $this->upload_file_name = $file_name;
    }

    /**
     * ファイルアップロード
     *
     * @access  public
     * return   bool
     */
    public function upload()
    {
        if(!$this->org_file || empty($this->org_file)) return false;
        return move_uploaded_file($this->org_file['tmp_name'], $this->getUploadPath());
    }

    /**
     * POSTで送信されいてるかのチェック
     *
     * @access  public
     * return   bool
     */
    public function enablePostFile()
    {
        if(!$this->org_file || empty($this->org_file)) return false;
        return is_uploaded_file($this->org_file['tmp_name']);
    }

    /**
     * ファイルの存在チェック
     *
     * @access  public
     * return   date
     */
    public function isFileExist()
    {
        return file_exists($this->getUploadPath());
    }

    /**
     * ファイルオープンする
     *
     * @access  protected
     * @param   string  $file
     * @return  resource
     */
    public function getHandle()
    {
        return fopen($this->getUploadPath(), 'r');
    }

    /**
     * 無駄な箇所をスキップする
     *
     * @access  protected
     * @param   resource    $handle
     * @param   string      $string
     */
    public function skipWaste($handle, $string)
    {
        while($values = fgetcsv($handle)){
            foreach($values as $_key => $_val){
                $values[$_key] = str_replace(array("\r", "\n"), '', $_val);
            }
            if(in_array($string, $values)){
                return $values;
                break;
            }
        }
    }

    /**
     * ファイルのキーとの関連マップを返却
     *
     * @access  protected
     * @param   array   $keys
     * @param   array   $fields
     * @return  array
     */
    public function getRelation($keys, $fields)
    {
        $relation = array();
        foreach($keys as $i => $key){
            $key = str_replace(array("\r", "\n", "\t", '　'), '', $key);
            $key = mb_convert_kana($key, 'a');
            $match = array_search($key, $fields);
            if($match !== false) $relation[$i] = $match;
        }
        return $relation;
    }

    /**
     * 最終更新日時取得
     *
     * @access  public
     * return   date
     */
    public function getFileUploadTime()
    {
        if($this->isFileExist()){
            return date("Y/m/d H:i:s", filemtime($this->getUploadPath()));
        }
    }

    /**
     * ファイルパスを取得
     *
     * @access  public
     * return   string
     */
    public function getUploadPath()
    {
        return getcwd() . $this->upload_dir . $this->upload_file_name;
    }
}

